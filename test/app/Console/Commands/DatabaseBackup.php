<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

use File;

use Illuminate\Support\Facades\DB;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create copy of mysql dump for existing database.';

    /**     
     *  Create a new command instance.     
     *      
     *  @return void     
     * 
     */    
    public function __construct(){        
        parent::__construct();    
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $mysqlHostName      = env('DB_HOST');
        // $mysqlUserName      = env('DB_USERNAME');
        // $mysqlPassword      = env('DB_PASSWORD'); 
        // $DbName             = env('DB_DATABASE'); 
        // $backup_name        = "backup.sql";
        $tables             = array("activity_logs","bill_lists", "customers", "failed_jobs", "migrations", "model_has_permissions", "model_has_roles", "password_resets", "permissions", "personal_access_tokens", "purchase_orders", "purchase_order_lists", "roles", "role_has_permissions", "tender_bills", "tender_infos", "to_do_projects", "to_do_tasks", "to_do_task_assigned_tos", "users"); //here your tables...
    
        $connect = DB::connection()->getPdo();
        // $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
    
        $output = '';
        foreach($tables as $table)
        {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();
    
            foreach($show_table_result as $show_table_row)
            {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();
    
            for($count=0; $count<$total_row; $count++)
            {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        // $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        // $file_handle = fopen($file_name, 'w+');
        $file_name = __DIR__ . '/../../../database/database_backup_on_' . date('y_m_d') . '.sql';
        $file_handle = fopen($file_name, 'w + ');
        fwrite($file_handle, $output);
        fclose($file_handle);

        return 0;
    }
}
