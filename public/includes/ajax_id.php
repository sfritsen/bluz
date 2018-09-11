<?php

//Connect to DB
$conn = new mysqli('localhost', 'bluz_user', 'bluz_password', 'bluez');

if ($conn->connect_error) {
    die("Bunk connection: ".$conn->connect_error);
}

// Get value entered
$emp_id = $_POST["agent_id"];

// If not empty
if($emp_id !== "")
{
    // Parse the given value to align with table employee_data personnel_number
	$emp_id = preg_replace('~[a-z]~i','',$emp_id);
	$emp_id = str_pad($emp_id, 8, "0", STR_PAD_LEFT);
	$emp_id = trim($emp_id);

	$sql="
	SELECT manager_personnel_number,
		manager_name,
		first_name,
		last_name,
        known_as,
		work_address_city,
		personnel_number,
        position_code_title,
        smtp_address
	FROM employee_data
	WHERE personnel_number = '$emp_id'
	";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$totalRows = mysqli_num_rows($result);

    // If no matching record was found, demo employee is used
	if($totalRows == "0")
	{
		$agent_info = "<span class=\"error_text\">Agent Not Found. Demo Employee information will be used.</span>";

        $sql="
    	SELECT manager_personnel_number,
    		manager_name,
    		first_name,
    		last_name,
    		work_address_city,
    		personnel_number,
            position_code_title
    	FROM employee_data
    	WHERE personnel_number = '00999999'
    	";

    	$result = mysqli_query($conn, $sql);
    	$row = mysqli_fetch_assoc($result);
	}
	else
	{
        // known_as used since not always the same as first_name
		// $agent_info = "<span class=\"deco_text\">Agent </span> : ".$row['known_as']." ".$row['last_name']."&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"deco_text\">Manager</span> : ".$row['manager_name'];
		$agent_info = "<div class=\"agent_info_cage\">".
						$row['known_as']." ".$row['last_name']." / ".$row['position_code_title']."<br>".
						$row['manager_name']." (Manager)".
						"</div>";
	}
}

// Build array to send back
$employee_info = array(
    'agent_info'        => $agent_info,
    'employee_name'     => $row['first_name']." ".$row['last_name'],
    'employee_id'       => $row['personnel_number'],
    'employee_city'     => $row['work_address_city'],
    'employee_mgr_id'   => $row['manager_personnel_number'],
    'employee_mgr_name' => $row['manager_name'],
    'employee_title'    => $row['position_code_title'],
    'smtp_address'      => $row['smtp_address']
);

print json_encode($employee_info);

// Close the connection
$conn->close();
?>