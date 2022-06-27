<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <?php
            if(preg_match("/Disconnected/" , file_get_contents('../storage/status.txt'))){
                echo '<span class="text-danger">Disconnected</span>';
            }else{
                $detail = getStr(['Country:' , 'Current technology:'] , file_get_contents('../storage/status.txt'));
                echo '<span class="text-success">Connected</span><br><br>';
                echo '<small class="text-success">';
                echo 'Country : '.nl2br($detail[1]);
                echo '</small>';
            }
            ?>
        </h5>
        <div class="form-group mb-3">
            <form method="POST" action="cmd.php?x=connect">
            <label for="country" class="form-label">Select Countries</label>
            <select name="country" id="country" class="form-control">
                <?php
                
                $countries = file_get_contents('../storage/countries.txt');
                $countries = getStr(['Albania', 'Sweden'],$countries);
                $exp = explode("\n" , $countries[1]);
                foreach($exp as $country){
                    echo '<option value="'.$country.'">'.$country.'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <?php
            if(preg_match("/Disconnected/" , file_get_contents('../storage/status.txt'))){
                echo '<button type="submit" class="btn btn-primary" id="connect">Connect</button>';
            }else{
                echo '<button type="submit" class="btn btn-warning" id="connect">reConnect</button>&nbsp;';
                echo '<a href="cmd.php?x=disconnect" class="btn btn-danger" id="disconnect">Disconnect</a>';
            }
            ?>
        </div>
        </form>
    </div>
</div>