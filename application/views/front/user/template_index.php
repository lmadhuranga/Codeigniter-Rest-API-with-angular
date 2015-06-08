<section>
    <h4>Organizatios</h4>
    <a href="#/create">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Email</th> 
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
                <tr ng-repeat="User in Users">
                    <td>{{User.id}}</td>
                    <td><a href="#view/{{User.id}}">{{User.name}}</a></td>  
                    <td>{{User.email}}</td>
                    <td><a href="#/edit/{{User.id}}"><i class="icon-edit">Edit</i></a></td>
                    <td><a ng-click="deleteUser(User)"  href="#/delete/{{User.id}}"><i class="icon-remove">Delete</i></a></td>

                </tr>
            
        </tbody>

    </table>
</section>