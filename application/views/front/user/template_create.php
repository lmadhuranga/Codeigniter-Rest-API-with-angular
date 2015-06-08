    <h4>Crete user</h4>
    <p></p>

    
    <form class="form-horizontal" ng-submit="createUser()">

    <table class="table">
        <tr>
            <td class="tablefield">Name*</td>
            <td><input type="text" name="account_name" ng-model="Users.name"></td> 
        </tr>
         
        
        <tr>
            <td colspan="3">
                <?php echo form_submit('submit','Save', 'class="btn btn-success"'); ?>                
            </td>
            <td></td>
        </tr>
    </table>
    <?php echo form_close(); ?>