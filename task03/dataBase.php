<?
class dataBase {
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "root";
    private $db = 'de';

    /**
     * @return array || error
     */
    public function getSimpleStatisticsUsers()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'SELECT username, training_date, COUNT(training_id) as cnt_les
FROM users u
INNER JOIN trainings t ON(u.user_id = t.user_id)
GROUP BY username, training_date
HAVING COUNT(*) > 1
ORDER BY username, training_date DESC';

        if ($result = $conn->query($sql)) {
            return $result->fetch_all();
        }
    }

}
?>