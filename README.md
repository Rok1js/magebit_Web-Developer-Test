# How to run a project locally
To run the project locally you need to install XAMPP - a web server solution stack package and make a database to store data.
Files need to be put into "\xampp\htdocs" folder.

# Database
Database parametrs
```bash
host = "localhost";
username = "root";
password = "";
database = "emails"
```
```bash
CREATE DATABASE emails;
```

```bash
CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (ID)
)

ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
```
