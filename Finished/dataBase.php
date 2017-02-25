<?
class dataBase {


    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "root";
    private $db = 'de';

    function __construct(){

    }

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

    public function getCntLessons($users)
    {
        $result[0] = 'all';
        foreach ($users as $user) {
            $result[$user[2]] = $user[2];
        }

        return json_encode($result, JSON_FORCE_OBJECT);
    }

}
?>