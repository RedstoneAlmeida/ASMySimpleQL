# ASMySimpleQL
This repository is created for use your mysql on a simple way. Follow the examples.

### Installation
Install the package provided of [packagist.com](packagist.com) using the command: ```composer require as_php\asmysimpleql```

## First Steps
You must instantiate the class ```Query```, from namespace ```ASPHP\ASMySimpleQL\Query``` and put on construct, the login of database.
```$query = new Query('host', 'user', 'password', 'database');```
or if your prefer:
```
$query->setHost('host');
$query->setUser('user');
$query->setPassword('password');
$query->setDatabase('database';
```

### Select all columns from first value
example 1:
```
$query->SelectAllCollumnsFromFirst('your_table', [
    'column' => 'value'
]);
```
example 2:
```
$query->SelectAllCollumnsFromFirst('your_table', [
    'column' => 'value',
    'column2' => 'value2'
]);
```
The example 1 will execute the SQL command: ```SELECT * FROM your_table WHERE column = 'value';```
The example 2 will execute the SQL command: ```SELECT * FROM your_table WHERE column = 'value' AND column2 = 'value2';```
The return is provided a array.
