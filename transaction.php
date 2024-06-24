<?php
include './services/transactionServices/fetchTransaction.php';
include './services/ledgerServices/readLedger.php';
ob_start();
?>

<form action="./services/transactionServices/addTransaction.php" method="POST">
    <label style="display: block;" for=""> Select Debit or Credit</label>
    <select style="display: block; margin-bottom: 10px;" type="text" name="is_debit_or_credit">
        <option value="">--Select One Below--</option>
        <option value="DR">Debit</option>
        <option value="CR">Credit</option>
    </select>

    <label style="display: block;" for=""> Enter Amount</label>
    <input style="display: block; margin-bottom: 10px;" type="number" name="amount" placeholder="Eg: 10000">

    <label style="display: block;" for=""> Select Ledger Id</label>
    <select style="display: block; margin-bottom: 16px;" type="text" name="ledger_id">
        <option value="">--Select One Below--</option>
        <?php
        foreach($ledger_data as $data){
            echo "<option value=".$data['id'].">".$data['id']." - ".$data['entity']."</option>";
        }
        ?>
    </select>
    <button class="btn btn-success" type="submit">Submit</button>
</form>


<h5 class="mt-5">All Transaction list</h5>
<table class="table mt-2" border="1">
    <thead>
        <tr>
            <th scope="col">SN</th>
            <!-- <th scope="col">Entity</th> -->
            <th scope="col">DR/CR</th>
            <th scope="col">Amount</th>
            <th scope="col">Ledger ID</th>
            <th scope="col">Ledger Name</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
	    foreach($transaction_data as $row){
		    echo "<tr>";
            echo "<th scope='row'>".$row['id']."</th>";
            // echo "<td>".$row["entity"]."</td>";
            echo "<td>".$row['is_debit_or_credit']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['ledger_id']."</td>";
            echo "<td>
                    <a href='edittransaction.php?transaction_id=".$row['id']."'>
                        <button type='button' class='btn btn-primary'>Edit</button>
                    </a>
                    <a href='./services/transactionServices/deleteTransaction.php?transaction_id=".$row['id']."'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </a>
                </td>";
            echo "</tr>";   
	    }
	    ?>
    </tbody>
</table>

<?php
 $content = ob_get_clean();
include 'layout.php';
?>