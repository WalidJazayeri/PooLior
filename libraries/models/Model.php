<?php
require_once './libraries/database.php';
abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    /**
     * Retourne l'item donné par l'id en paramètre
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        // On exécute la requête en précisant le paramètre :article_id
        $query->execute(['id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();
        return $item;
    }

    /**
     * Supprime un item
     */
    public function delete(int $id) : void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

            /**
     * Retourne la liste d'item qui PEUT être classés par date de création
     * @return array
     */
    public function findAll(?string $order = "") : array
    {
        $sql = "SELECT * FROM {$this->table}";
        if($order)
        {
            $sql .= " ORDER BY " . $order;
        }
        // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();
        return $articles;
    }
}
?>