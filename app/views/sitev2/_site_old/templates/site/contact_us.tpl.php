<?=Registry::get("Template")->fetch('site/includes/head.tpl.php', false)?>
    <body>
        <?=Registry::get("Template")->fetch('site/includes/top_left.tpl.php', false)?>
        <div class="colRight">
            <div class="contentWrapper">
                <?=Registry::get("Template")->fetch('site/includes/pageTitle.tpl.php', false)?>
                <script type="text/javascript">
                /**                        
                 * CONTACT US PAGE
                 */
                 function addRecipient(val){
                    item = val.split(',');
                    div = document.getElementById('contactTo');
                    if(div.innerHTML == 'This field will automatically fill when you click a link below'){
                        $('#contactTo').html('');
                        $('#contactTo').css('font-style', 'normal');
                    }
                    itemHtml = '<div class="contactRecipient">';
                    itemHtml += item[0];
                    itemHtml += ' <a href="">x</a></div>';
                    div.innerHTML += itemHtml;
                    
                 }           
                </script>
                <div class="contactWrap">
                    <div class="contactForm">
                        <form>
                            <table cellspacing="0" cellpadding="0" class="contactFormT">
                                <tr>
                                    <td>
                                        To
                                    </td>
                                    <td>
                                        <div id="contactTo">This field will automatically fill when you click a link below</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Subject
                                    </td>
                                    <td>
                                        <input id="contactSubject" type="text" name="contactTo" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Message
                                    </td>
                                    <td>
                                        <textarea id="contactMessage"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="subContact" value="Send" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="contactBox">
                        <h6>Training Department</h6>
                        <div class="contactTxtBox">
                            Contact the training department. This will email Ross Bristo (Training Director),
                            Alex Jefferies (ATC Training Manager) and Frank Plumber (Pilot Training Manager).
                            <div class="contactTxtBoxLink"><input type="button" name="Training,training@vatsim-uk.co.uk" value="Contact Department" onclick="addRecipient(this.name)" /></div>
                        </div>
                    </div>
                    <div class="contactBox">
                        <h6>Web Services</h6>
                            Contact the training department. This will email Anthony Lawrence (Web Services
                            Director) & Chris Doherty (Web Services Manager).
                            <div class="contactTxtBoxLink"><input type="button" name="Web Services,web.services@vatsim-uk.co.uk" value="Contact Department" onclick="addRecipient(this.name)" /></div>
                    </div>
                </div>
            </div>
        </div> <!-- colRight -->
<?=Registry::get("Template")->fetch('site/includes/foot.tpl.php', false)?>