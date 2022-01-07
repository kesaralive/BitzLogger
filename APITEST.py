import requests
import json
from requests.structures import CaseInsensitiveDict

url = "[API_URL]"

headers = CaseInsensitiveDict()
headers["Accept"] = "application/json"
headers["Authorization"] = "Basic [BASIC_AUTH_KEY]"
headers["Content-Type"] = "application/json"
val = 'kesara'
data_json = {
    "logs": val
}

data = json.dumps(data_json)

resp = requests.post(url, headers=headers, data=data)

print(resp.status_code)
