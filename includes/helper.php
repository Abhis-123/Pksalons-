<?php
function validate_input_text($textValue){
    
    if (!empty($textValue)){
        $trim_text =trim($textValue);
        // remove illegal character
        
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return '';
}
function time_to_seconds($time){
    $str_time=$time;
    $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

    sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
 
    $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

return $time_seconds;
}
function seconds_to_time( $var)
{

    $init = $var;
    $hours = floor($init / 3600);
    $minutes = floor(($init / 60) % 60);
    $seconds = $init % 60;
   
    if($hours>12){
        $hours=$hours-12;
        if ($minutes<10) {
            return $hours.":0".$minutes.":".$seconds.' '.' PM';
        }
        return $hours.":".$minutes.":".$seconds.' '.' PM';
    }else{
        if ($minutes<10) {
            return $hours.":0".$minutes.":".$seconds.' '.' AM';
        }
       return $hours.":".$minutes.":".$seconds.' '.' AM';
    }
  
}
function validate_input_number($number){
    if (!empty($number)){
        $trim_text = trim($number);
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);

        return $sanitize_str;
    }
    return '';
}
function create_notification($to,$from,$message,$time,$con){
    $query="INSERT INTO notifications(to_uid,from_uid,message,date_time) VALUES('$to','$from','$message','$time')";
    mysqli_query($con,$query);

 
 }
function validate_input_email($emailValue){
    if (!empty($emailValue)){
        $trim_text = trim($emailValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
    return '';
}

// profile image
function upload_profile($path, $file,$name){
    $targetDir = $path;
    $default = "beard.png";

    // get the filename
    $filename = $file;
    $targetFilePath = $targetDir.$name;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    If(!empty($filename)){
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if(in_array($fileType, $allowType)){
            // upload file to the server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    // return default image
    return $path . $default;
}


// get user info
function get_user_info($con, $userID){
    $query = "SELECT firstName, lastName, email,mobile_number,profileImage FROM user WHERE userID=?";
    $q = mysqli_stmt_init($con);

    mysqli_stmt_prepare($q, $query);

    // bind the statement
    mysqli_stmt_bind_param($q, 'i', $userID);

    // execute sql statement
    mysqli_stmt_execute($q);
    $result= mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result);
    
    return empty($row) ? false : $row;
}

"ADD	EXCEPT	PERCENT
ALL	EXEC	PLAN
ALTER	EXECUTE	PRECISION
AND	EXISTS	PRIMARY
ANY	EXIT	PRINT
AS	FETCH	PROC
ASC	FILE	PROCEDURE
AUTHORIZATION	FILLFACTOR	PUBLIC
BACKUP	FOR	RAISERROR
BEGIN	FOREIGN	READ
BETWEEN	FREETEXT	READTEXT
BREAK	FREETEXTTABLE	RECONFIGURE
BROWSE	FROM	REFERENCES
BULK	FULL	REPLICATION
BY	FUNCTION	RESTORE
CASCADE	GOTO	RESTRICT
CASE	GRANT	RETURN
CHECK	GROUP	REVOKE
CHECKPOINT	HAVING	RIGHT
CLOSE	HOLDLOCK	ROLLBACK
CLUSTERED	IDENTITY	ROWCOUNT
COALESCE	IDENTITY_INSERT	ROWGUIDCOL
COLLATE	IDENTITYCOL	RULE
COLUMN	IF	SAVE
COMMIT	IN	SCHEMA
COMPUTE	INDEX	SELECT
CONSTRAINT	INNER	SESSION_USER
CONTAINS	INSERT	SET
CONTAINSTABLE	INTERSECT	SETUSER
CONTINUE	INTO	SHUTDOWN
CONVERT	IS	SOME
CREATE	JOIN	STATISTICS
CROSS	KEY	SYSTEM_USER
CURRENT	KILL	TABLE
CURRENT_DATE	LEFT	TEXTSIZE
CURRENT_TIME	LIKE	THEN
CURRENT_TIMESTAMP	LINENO	TO
CURRENT_USER	LOAD	TOP
CURSOR	NATIONAL	TRAN
DATABASE	NOCHECK	TRANSACTION
DBCC	NONCLUSTERED	TRIGGER
DEALLOCATE	NOT	TRUNCATE
DECLARE	NULL	TSEQUAL
DEFAULT	NULLIF	UNION
DELETE	OF	UNIQUE
DENY	OFF	UPDATE
DESC	OFFSETS	UPDATETEXT
DISK	ON	USE
DISTINCT	OPEN	USER
DISTRIBUTED	OPENDATASOURCE	VALUES
DOUBLE	OPENQUERY	VARYING
DROP	OPENROWSET	VIEW
DUMMY	OPENXML	WAITFOR
DUMP	OPTION	WHEN
ELSE	OR	WHERE
END	ORDER	WHILE
ERRLVL	OUTER	WITH
ESCAPE	OVER	WRITETEXT
"

?>







