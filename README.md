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

The return is provided a array or error if the table or columns not exists.

### Insert value on the table
example 1:
```
$query->Insert('your_table', [
    'column' => 'value'
]);
```
example 2:
```
$query->Insert('your_table', [
    'column' => 'value',
    'column2' => 'value2'
]);
```
The example 1 will execute the SQL command: ```INSERT INTO your_table (column) VALUES ('value');```

The example 2 will execute the SQL command: ```INSERT INTO your_table (column, column2) VALUES ('value', 'value2');```

The return is provided bool or error if the table or columns not exists.

### Update value of table
example 1:
```
$query->Update('your_table',
    ['column' => 'newvalue'],
    ['where_column' => 'value']
);
```
example 2:
```
$query->Update('your_table',
    ['column' => 'newvalue', 'column2' => 'newvalue2'],
    ['where_column' => 'value', 'where_column2' => 'value2']
);
```
The example 1 will execute the SQL command: ```UPDATE your_table SET column = 'newvalue' WHERE where_column = 'value';```

The example 2 will execute the SQL command: ```UPDATE your_table SET column = 'newvalue', column2 = 'newvalue2' WHERE where_column = 'value' AND where_column2 = 'value2';```

The return is provided bool or error if the table or columns not exists.

### Delete value of table
example 1:
```
$query->Delete('your_table', [
    'column' => 'value'
]);
```
example 2:
```
$query->Delete('your_table', [
    'column' => 'value',
    'column2' => 'value2'
]);
```
The example 1 will execute the SQL command: ```DELETE FROM your_table WHERE column = 'value';```

The example 2 will execute the SQL command: ```DELETE FROM your_table WHERE column = 'value' AND column2 = 'value2';```

The return is provided bool or error if the table or columns not exists.



#### More actions is coming soon.
