<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {

    }

    // // public static function updateTodo($todoId, $title, $completed = null)
    // // {
    // //     // TODO: Implement me!
    // //     // Update a specific todo
    // // }

    public static function deleteTodo($todoId)
    {
        try {
            $query = "DELETE FROM  todos WHERE id = :id";
            self::$db->query($query);
            self::$db->bind(':id', $todoId);

            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Error occured when trying to delete id.");
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
       
    }
    
    // (Optional bonus methods below)
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }

}
