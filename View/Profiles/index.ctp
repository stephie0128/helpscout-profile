
<div class="container">
    
<div class="page-header">
</div>
<?php 
    if($this->Session->flash() != "") {
    
?>  

<div class="alert alert-danger">  
    <!-- <a class="close" data-dismiss="alert">×</a> -->  
    <strong>Success!</strong> Profile Deleted.  
    </div>
<?php 
    }
?>

<div class="well">
<p> You can view a profile, update an existing profile or delete a profile. Filtering profiles can be done using the search feature.</p>
<p><b>To create a new Pofile click the green button below. Potential similar profiles can be viewed by clickin the red button below.</b></p>
<p>
<?php 
echo $this->Html->link(
    'Create Profile &raquo;',
    array(
        'controller' => 'profiles',
        'action' => 'create',
       
    ),
    array(  'class' => 'btn btn-lg btn-success',
            'role' => 'button',
            'escape'=> false )
);
?>
&nbsp;&nbsp;&nbsp;
<?php 
echo $this->Html->link(
    'Similar Profiles &raquo;',
    array(
        'controller' => 'profiles',
        'action' => 'similar',
       
    ),
    array(  'class' => 'btn btn-lg btn-danger',
            'role' => 'button',
            'escape'=> false )
);
?>


    </p>

</div>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Email</th>
            <th>Actions</th>
		</tr>
	</thead>
	<tbody>
		
		<?php foreach($profiles as $profile) {  ?>
		<tr class="gradeC">         
            <td><?php echo $profile['Profile']['first_name']; ?></td>
            <td><?php echo $profile['Profile']['last_name']; ?></td>  
            <td><?php echo $profile['Profile']['phone_number']; ?></td>  
            <td><?php echo $profile['Profile']['email']; ?></td>                    
            <td>
                <?php 
                    echo $this->Html->link(
                        '<span class="glyphicon glyphicon-home">',
                        array(
                            'controller' => 'profiles',
                            'action' => 'update',
                            $profile['Profile']['profile_id']
                        ),
                        array(  'class' => 'link',
                                'title' => 'Update Profile',
                                'data-toggle' => 'tooltip',
                                'role' => 'button',
                                'escape'=> false )
                    );
               ?>
      
                <a href="/helpscout/profiles/delete/<?php echo $profile['Profile']['profile_id']; ?>" class="delbtn"
                    	title="Are you sure you want to delete the profile for <strong>
                    	<?php echo $profile['Profile']['first_name'] . " " .
                                   $profile['Profile']['last_name'];      
                        ?>
                    	</strong>">
                    	<span class="glyphicon glyphicon-trash"></span></a>
             </td>
         </tr>
         <?php } ?>
		</tbody>
	<tfoot>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Email</th>
            <th>Actions</th>
		</tr>
	</tfoot>
</table>
</div>

		