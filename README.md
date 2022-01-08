# Keylogger-Backdoor
This is an educational project that sends target machine's key press log to a cloud server by creating a backdoor. 

## Current version (3) of Keylogger & Backdoor
In the current version, <br>
Once the target user is affected by the script it sends us an email of its key log at a time interval which can edit from inside the script file.
`keylogger = Keylogger([TIME_INTERVAL_GOES_HERE], "[YOUR_EMAIL_HERE]", "[EMAIL_PASSWORD_HERE]")` <br> 
It also creates an API request to an endpoint created in a google cloud instance. G-Cloud DNS helps us to resolve the domain name to the instance IP address. <br> API URL can be edited inside the script file. <br>
`url = "[API_URL]"` <br>

![version3](https://user-images.githubusercontent.com/90370604/148632606-9dd6dfbf-7d90-4ec3-8be1-4e5e8242a92f.jpg)

# Future Improvements
![image](https://user-images.githubusercontent.com/90370604/148635652-c85728f7-2e18-4e1a-b886-7f03296ad9f1.png)


# History & Issues
## Version 2
![image](https://user-images.githubusercontent.com/90370604/148635675-3c497bd8-91de-48d5-9702-46031802c187.png)

### Direct Database Connectivity though TCP/IP
### Issues
## Version 1
![image](https://user-images.githubusercontent.com/90370604/148635659-7d1d4897-d818-4e6d-a584-b8af16d70fb3.png)

### Only sends us an Email
### Issues
