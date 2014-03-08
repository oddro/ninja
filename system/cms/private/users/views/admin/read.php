<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-title">
                <h4><i class="icon-user"></i> User List</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="hidden-phone">First Name</span>
                            </th>
                            <th>
                                <span class="hidden-phone ">Last Name</span>
                            </th>
                            <th>
                                <span class="hidden-phone">Email</span>
                            </th>
                            <th>
                                <span class="hidden-phone">Grup</span>
                            </th>
                            <th>
                                <span class="hidden-phone">Status</span>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user->first_name ?></td>
                                    <td><?php echo $user->last_name ?></td>
                                    <td><?php echo $user->email ?></td>
                                    <td>
                                        <?php foreach($user->groups as $group): ?>
                                        <?php  echo $group->name; ?><br/>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($user->active)
                                            {
                                                echo anchor('users/deactivate/$user->id', '<span class="label label-success">Active</span>');
                                            }
                                            else
                                            {
                                                echo anchor('users/activate/$user->id', '<span class="label">Inactive</span>');
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('admin/users/update/'.$user->id.'/'.url_title($user->username)) ?>" class="btn mini black"><i class="icon-edit"></i> Update</a>
                                        <a href="<?php echo site_url('admin/users/delete/'.$user->id.'/'.url_title($user->username)) ?>" class="btn mini black"><i class="icon-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <td colspan="7"><center><strong>Data Not Found</strong></center></td>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="space7"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>