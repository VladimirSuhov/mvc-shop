<?php
/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 27.09.2017
 * Time: 0:34
 */
class News
{
    /*
     * Returns single news item with specified id
     * @param   integer $id
     */
    public static function getNewsItemById($id) {
        // Query to DB
        if($id) {

            $db = DB::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id =' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }
    /*
     * Returns array of news items
     */
    public static function getNewsList() {
        // Query to DB
        $db = DB::getConnection();

        $newsList = array();
        $result = $db->query('SELECT id, title, date, short_content '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }
}