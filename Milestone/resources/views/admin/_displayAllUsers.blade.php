<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <style>
        #users {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #users td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #users tr:nth-child(even){background-color: #f2f2f2;}

        #users tr:hover {background-color: #ddd;}

        #users th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #333333;
            color: white;
        }
    </style>
</head>

<table id="users" class="display">

    <thead>
    <th>Change User</th>
    <th>Remove User</th>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Username</th>
    <th>Password</th>
    <th>Role</th>
    </thead>
    <tbody>
    <?php
    for ($x = 0; $x < count($allUsers); $x++) {

        echo "<tr>";
        //array

        echo "<td><form action='../views/editUserForm.php'><input type='submit' value='Edit'><input type='hidden' name='id' value=".$allUsers[$x]['id']."></form></td>";
        echo "<td><form action='../handlers/deleteUser.php'><input type='submit' value='Delete'><input type='hidden' name='id' value=".$allUsers[$x]['id']."></form></td>";
        echo "<td><form action='../views/showUser.php'><input type='submit' value='".$allUsers[$x]['id']."'><input type='hidden' name='id' value=".$allUsers[$x]['id']."></form></td>";
        echo "<td>".$allUsers[$x]['first_name']."</td>";
        echo "<td>".$allUsers[$x]['last_name']."</td>";
        echo "<td>".$allUsers[$x]['email']."</td>";
        echo "<td>".$allUsers[$x]['password']."</td>";
        echo "<td>".$allUsers[$x]['admin_role']."</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#users').DataTable();
    } );
</script>