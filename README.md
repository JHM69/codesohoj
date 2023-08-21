# Codesohoj
<img src="https://raw.githubusercontent.com/JHM69/codesohoj/a6cd5cb956d70c71ff039139af3cfc6fd4ff0176/web/assets/img/app_logo.svg" alt="Logo" width="100">

Codesohoj is an online platform that combines the benefits of an online judge and a coding learning platform. It offers programming problems, educational content, and supports multiple programming languages to provide an engaging learning experience for users of all levels.

**Project Team:**
```
- Jahangir Hossain (B190305009)
- Md. Farhan Masud Shohag (B190305043)

Mentor:
  Dr. Sajeeb Saha  
  Associate Professor of Computer Science and Engineering  
  Jagannath University
```
# Architecture 
## User Journey 
<img src="https://github.com/JHM69/codesohoj/blob/master/img/img1.png?raw=true" alt="User Jouerney "  >

## Internal Architecture
<img src="https://github.com/JHM69/codesohoj/blob/master/img/img2.png?raw=true" alt="Internal Architecture"  >


## Features

 - User Handle
 - Collection of Problems
 - Learning Resources by Topic
 - Tutorials & Articles
 - Built-in Blogging Platform
 - User Interactions & Community Building
 - Progress Tracking
 - Solve Practice Problems
 - Built-in Code Editor & Judge
 - Contest Arrangement
 - Find Problems By Catagories

<img src="https://github.com/JHM69/codesohoj/blob/master/img/f.gif?raw=true" alt="Internal Architecture"  >


# To start the server: 
navigate to root/codesohoj directory and run
```bash
php -S localhost:8000 -t web/
```

# Run Judge Server
navigate to codesohoj/judge directory and run
```bash
pip install -r requirements.txt
pip install lockfile
sudo python3 judge.py -judge -cache
```
