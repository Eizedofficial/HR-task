<?php
    class CProducts{

        function print_data($limit){
            $connection = $this->connect();
    
            $query = "SELECT * FROM products WHERE IS_HIDDEN < 1 ORDER BY DATE_CREATE DESC ".$limit;
            $data = $connection->query($query);
            $rows = array();
    
            if($data->num_rows > 0)
            {
                while($r = $data->fetch_assoc()) {
                    $rows[] = $r;
                }
            }
    
            print json_encode($rows);
        }

        function connect(){
            $connection = new mysqli("localhost", "root", "", "test");
            if($connection->connect_errno){
                echo "Невозможно подключиться к базе данных.";
                exit(0);
            }

            return $connection;
        }

        function hide_element($id){
            $conn = $this->connect();
            $query = "UPDATE products SET IS_HIDDEN = 1 WHERE id = ".$id;
            $result = $conn->query($query);
            return($result);
        }

        function get_products_quanity($all_or_visible){
            $query;
            $conn = $this->connect();

            if($all_or_visible == "all"){
                $query = "SELECT * FROM products";
            }
            elseif($all_or_visible == "visible"){
                $query = "SELECT * FROM products WHERE IS_HIDDEN = 0";
            }

            $response = $conn->query($query);
            return(mysqli_num_rows($response));
        }

    }
?>