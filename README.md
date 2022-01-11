# Keylogger-Backdoor
This is an educational project that sends target machine's key press log to a cloud server by creating a backdoor. 

# Contribute
1. Make sure your branch is `dev` and sync with the remote branch.
2. Create a new branch from the `dev` branch before start working on a new issue
3. Publish your branch
4. When all the commits are ready for publishing, Create a Pull Request to the `dev` branch
5. Make sure you are pulling 'from' your branch and pulling 'into' `dev` or immediate upstream branch
6. Make sure to use the PULL request template with title and the description with your changes. (detailed)
7. Review changes and Merge

## Commit Message Types
### Commit message template
`<type>[optional scope]:<description>` <br>
#### Example <br>
`style: update navbar hamburger drop down styles`
  <br>
1. feat - Features - A new feature
2. fix - Bug Fixes - A bug Fix
3. docs - Documentation - Documentation only changes
4. style - Styles - Changes that do not affect the meaning of the code
5. refactor - Code Refactoring - A code change that neither fixes a bug nor adds a feature
6. perf - Performance, Improvements - A code change that improves performance
7. test - Tests - Addming missing tests or correcting existing tests
8. build - Builds - Changes that affect the build system or external dependencies 
9. ci - Continuous Intergrations - Changes to our CI configuration files ans scripts 
10. chore - Chores Other changes that don't modify src or test files
11. revert - Reverts Reverts a previous commit

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
