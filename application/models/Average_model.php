<?php
class Average_model extends CI_Model
{
    public function getAverageForMonth($month)
    {

        $query = $this->db->select('YEAR(created_at) AS year, MONTH(created_at) AS month, AVG(ph) AS average')
            ->from('measurement_result')
            ->where('YEAR(created_at)', 2023)
            ->where('MONTH(created_at)', $month)
            ->group_by('YEAR(created_at), MONTH(created_at)')
            ->order_by('YEAR(created_at), MONTH(created_at)')
            ->get();

        $results = $query->result();

        // Convert numeric month to textual representation
        foreach ($results as &$result) {
            $result->month = date('M', mktime(0, 0, 0, $result->month, 1));
        }

        return $results;
    }
}
