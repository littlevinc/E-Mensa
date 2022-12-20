<form method="POST">
    <fieldset>
        <div class="formfield">
            <div><?php if(isset($_POST['submit']) && !empty($formOutput['error']['name'])) echo $formOutput['error']['name'];?></div>
            <input type="text" id="name" name="user" placeholder="Name" required value="<?php if(isset($_POST['user'])) echo $_POST['user']; ?>">
        </div>
        <div class="formfield">
            <div><?php  if(isset($_POST['submit']) && !empty($formOutput['error']['mail'])) echo $formOutput['error']['mail'];?></div>
            <input type="email" id="mail" name="mail" placeholder="E-Mail" required value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>">
        </div>
        <div class="formfield">
            <div><?php  if(isset($_POST['submit']) && !empty($formOutput['error']['lang'])) echo $formOutput['error']['lang'];?></div>
            <select name="lang" id="lang">
                <option value="Deutsch">Deutsch</option>
                <option value="English">English</option>
            </select>
        </div>
        <div class="formfield">
            <div><?php if(isset($_POST['submit']) && !empty($formOutput['error']['dsgvo'])) echo $formOutput['error']['dsgvo'];?></div>
            <input type="checkbox" id="dsgvo" name="dsgvo" value="true" required>
            <label for="dsgvo">Hiermit stimme ich den Datenschutzbestimmungen zu</label>
        </div>
        <input class="custom-button" type="submit" name="anmeldung" value="Zum Newsletter anmelden">
    </fieldset>
</form>
