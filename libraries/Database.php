<?php

class Database {

    private $pdo;

    public function __construct($host, $db, $user, $password, $charset = 'utf8'){
        $this->connect($host, $db, $user, $password, $charset = 'utf8');
    }

    /**
     * connect to database
     * 
     * @param string $host
     * @param string $db
     * @param string $user
     * @param string $password
     * @param string $charset
     */
    public function connect($host, $db, $user, $password, $charset = 'utf8') {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $password, $opt);
    }

    /**
     * select database
     * 
     * @param array $fields
     * @param string $table
     * @return array
     */
    public function select(array $arrayfields, $table) {
        $fields = implode(',', $arrayfields);
        $sql = "SELECT $fields FROM $table";
        return $this->pdo->query($sql)->fetchAll();
    }

    /**
     * insert record
     * @param array $arrayFieldValues
     * [
     *       'fields' => 'name,time,trainer',
     *       'values' => [
     *          ['HTML', 10, 'Mr.Thanh'],
     *          ['CSS', 10, 'Mr.Thanh'],
     *          ['JAVASCRIPT', 10, 'Mr.Thanh']
     *        ]
     * ];
     * @param string $table
     * @return boolean 
     */
    public function insert(array $arrayFieldValues, $table) {
        
        $sql = "INSERT INTO $table (" . $arrayFieldValues['fields'] . ") VALUES ";
        $fieldVals = '';

        foreach($arrayFieldValues['values'] as $fieldValues){
            $fieldVals .= '(';
            foreach($fieldValues as $value){
                $fieldVals .= "'$value',";
            }
            $fieldVals = substr($fieldVals,0,-1) . '),';
        }
        $fieldVals = substr($fieldVals, 0, -1);
        $sql .= $fieldVals;

        $this->pdo->prepare($sql)->execute();
        return true;
    }

    /**
     * update one record on database
     * 
     * @param string $field
     * @param mixed $value
     * @param string $table
     * @return boolean
     */
    public function update($field, $value, $table) {
        $sql = "UPDATE `$table` SET `$field` = ?";
        $this->pdo->prepare($sql)->execute([$value]);
        return true;
    }

    /**
     * delete a record
     * @param string $table
     * @return boolean
     */
    public function delete($table) {
        $sql = "DELETE FROM $table";
        $this->pdo->prepare($sql)->execute();
        return true;
    }

}