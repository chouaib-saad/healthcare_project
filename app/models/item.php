<?php

require_once __DIR__ . '/../models/Database.php';

class Item
{
    private $db;

    public function __construct()
    {
        // Get the database instance and the PDO object
        $this->db = Database::getInstance()->getPDO();
        
    }

    // Get all items
    public function getAllItems()
    {
        $query = "SELECT * FROM items";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add an item
    public function addItem($name, $description, $price)
    {
        // Prepare the insert query
        $query = "INSERT INTO items (name, description, price) VALUES (:name, :description, :price)";
        $stmt = $this->db->prepare($query);

        // Execute the query
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price
        ]);
    }

    // Delete an item by ID
    public function deleteItem($id)
    {
        $query = "DELETE FROM items WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }


        // Assuming you're using PDO for database connection
        public function getAll() {
            try {
                $query = "SELECT * FROM items"; // Query to fetch all items
                $stmt = $this->db->query($query); // Execute the query
                return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all items as an associative array
            } catch (PDOException $e) {
                // Handle any errors that occur during the query execution
                echo "Error fetching items: " . $e->getMessage();
                return [];
            }
        }
}
?>
