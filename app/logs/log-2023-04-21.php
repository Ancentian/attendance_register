<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-21 00:15:27 --> Severity: error --> Exception: Unclosed '{' on line 53 D:\xampp\htdocs\register\app\views\trainings\trainingSchedules.php 290
ERROR - 2023-04-21 00:16:50 --> Severity: error --> Exception: Unclosed '{' on line 53 D:\xampp\htdocs\register\app\views\trainings\trainingSchedules.php 290
ERROR - 2023-04-21 00:18:33 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:18:33 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:18:39 --> Severity: error --> Exception: Unclosed '{' on line 48 D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 250
ERROR - 2023-04-21 00:19:24 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:19:24 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:20:16 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:20:16 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:21:18 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:21:18 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:23:12 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:23:12 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:25:03 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:25:03 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:25:49 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:25:49 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:26:25 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:26:25 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:37:58 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:37:58 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:38:36 --> 404 Page Not Found: Res/assets
ERROR - 2023-04-21 00:38:36 --> 404 Page Not Found: Res/assets
ERROR - 2023-04-21 00:39:12 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:39:12 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:39:21 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:39:21 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:40:29 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:29 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:29 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:29 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:29 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:30 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:30 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:30 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:30 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 00:40:38 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:40:38 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:40:51 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:40:51 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:41:15 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:41:15 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 00:41:28 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:41:28 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:46:12 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT `training_schedules`.*, `trainings`.`id` as `trainID`, `trainings`.`training_name`, `cooperatives`.`id` as `coID`, `cooperatives`.`cooperative_name`, `users`.`id` as `userID`, `users`.`first_name`, `users`.`last_name`, `training_clusters`.`id` as `clusterID`, `training_clusters`.`cluster_name`
FROM `training_schedules`
JOIN `trainings` ON `trainings`.`id` = `training_schedules`.`training_id`
JOIN `cooperatives` ON `cooperatives`.`id` = `training_schedules`.`cooperative_id`
JOIN `users` ON `users`.`id` = `training_schedules`.`created_by`
JOIN `users` ON `users`.`id` = `training_schedules`.`verified_by`
JOIN `training_clusters` ON `training_clusters`.`id` = `training_schedules`.`cluster_id`
ERROR - 2023-04-21 00:46:12 --> Severity: error --> Exception: Call to a member function result() on bool D:\xampp\htdocs\register\app\models\Training_model.php 50
ERROR - 2023-04-21 00:51:39 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:51:39 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 00:52:37 --> Query error: Unknown column 'users.id' in 'field list' - Invalid query: SELECT `training_schedules`.*, `trainings`.`id` as `trainID`, `trainings`.`training_name`, `cooperatives`.`id` as `coID`, `cooperatives`.`cooperative_name`, `users`.`id` as `userID`, `users`.`first_name`, `users`.`last_name`, `training_clusters`.`id` as `clusterID`, `training_clusters`.`cluster_name`
FROM `training_schedules`
JOIN `trainings` ON `trainings`.`id` = `training_schedules`.`training_id`
JOIN `cooperatives` ON `cooperatives`.`id` = `training_schedules`.`cooperative_id`
JOIN `users` as `created_by_user` ON `created_by_user`.`id` = `training_schedules`.`created_by`
JOIN `users` as `verified_by_user` ON `verified_by_user`.`id` = `training_schedules`.`verified_by`
JOIN `training_clusters` ON `training_clusters`.`id` = `training_schedules`.`cluster_id`
ERROR - 2023-04-21 00:52:37 --> Severity: error --> Exception: Call to a member function result() on bool D:\xampp\htdocs\register\app\models\Reports_model.php 23
ERROR - 2023-04-21 01:05:30 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:05:30 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> Severity: Warning --> Array to string conversion D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:11:16 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:11:16 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:12:58 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:12:58 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> Severity: Warning --> Undefined array key "first_name" D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 62
ERROR - 2023-04-21 01:16:38 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:16:38 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Undefined variable $name D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\views\reports\trainingsReport.php 68
ERROR - 2023-04-21 01:34:30 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:34:30 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:35:28 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:35:28 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:36:52 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:36:52 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 01:46:33 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:46:33 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:52:58 --> Severity: error --> Exception: syntax error, unexpected variable "$verified_by", expecting ")" D:\xampp\htdocs\register\app\controllers\Training.php 221
ERROR - 2023-04-21 01:53:31 --> Severity: Warning --> Undefined array key 3 D:\xampp\htdocs\register\app\controllers\Training.php 194
ERROR - 2023-04-21 01:53:31 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:53:31 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:53:44 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:53:44 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:07 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:07 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:20 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:20 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:39 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:39 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:54 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:55:54 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:59:00 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 01:59:00 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:00:47 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:00:47 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:01:07 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:01:07 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:05:38 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:05:38 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:06:58 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:06:58 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:07:24 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:07:24 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:08:14 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:08:14 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:08:59 --> Severity: Warning --> Undefined array key 2 D:\xampp\htdocs\register\app\controllers\Training.php 194
ERROR - 2023-04-21 02:08:59 --> Severity: Warning --> Undefined array key 3 D:\xampp\htdocs\register\app\controllers\Training.php 194
ERROR - 2023-04-21 02:09:00 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:09:00 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:12 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:13 --> 404 Page Not Found: Home/assets
ERROR - 2023-04-21 02:09:24 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:09:24 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:10:54 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:10:54 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:13:05 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:13:05 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:13:10 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\controllers\Training.php 82
ERROR - 2023-04-21 02:17:58 --> Severity: Warning --> Trying to access array offset on value of type null D:\xampp\htdocs\register\app\controllers\Training.php 82
ERROR - 2023-04-21 02:18:11 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:18:11 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:19:14 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:19:14 --> 404 Page Not Found: Reports/assets
ERROR - 2023-04-21 02:19:31 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:19:31 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:20:10 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:20:10 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:20:37 --> Severity: Warning --> Undefined array key 2 D:\xampp\htdocs\register\app\controllers\Training.php 194
ERROR - 2023-04-21 02:20:37 --> Severity: Warning --> Undefined array key 3 D:\xampp\htdocs\register\app\controllers\Training.php 194
ERROR - 2023-04-21 02:20:37 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:20:37 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:23:40 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:23:40 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:45:32 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:45:32 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:54:43 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 02:54:43 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 03:04:23 --> 404 Page Not Found: Training/assets
ERROR - 2023-04-21 03:04:23 --> 404 Page Not Found: Training/assets
