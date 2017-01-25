<?php // Displays the tab view for each of the classes
$online = rwmb_meta( 'ct_online');
$gtmlink = rwmb_meta('ct_gtm_link');
$book = rwmb_meta('ct_book');
$bookname = rwmb_meta('ct_book-name');
$bookprice = rwmb_meta('ct_book-price');
$bookisbn = rwmb_meta('ct_book-isbn');
$level = rwmb_meta('ct_level');
$summary = rwmb_meta('ct_summary');
$agenda = rwmb_meta('ct_agenda');
$agendapdf = rwmb_meta('ct_agenda-upload');
$audience = rwmb_meta('ct_audience');
$prereqs = rwmb_meta('ct_prereqs');
$price = rwmb_meta( 'ct_price');



?>
<br style="clear:both" />
<p>
<div class="fusion-separator fusion-full-width-sep sep-single" style="border-color:#e0dede;border-top-width:1px;margin-left: auto;margin-right: auto;margin-top:20px;margin-bottom:20px;"></div>
<div class="fusion-sep-clear"></div>
<?php  ct_sister_pages($post); ?>
<div class="fusion-tabs fusion-tabs-1 classic horizontal-tabs"><div class="nav"><ul class="nav-tabs nav-justified"><li class="active"><a class="tab-link" id="fusion-tab-title" href="#tab-9b1880eb7b9405fed6d" data-toggle="tab">
               <h4 class="fusion-tab-heading"><i class="fa fontawesome-icon fa-desktop"></i>About the program</h4>
            </a>
         </li>
         <li>
            <a class="tab-link" id="fusion-tab-courseoutline" href="#tab-8a07a4ba410961af9e2" data-toggle="tab">
               <h4 class="fusion-tab-heading"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Course outline</h4>
            </a>
         </li>
         <li>
            <a class="tab-link" id="fusion-tab-whoisitfor?" href="#tab-119237e103a4367351d" data-toggle="tab">
               <h4 class="fusion-tab-heading"><i class="fa fontawesome-icon fa-user"></i>Who is it for?</h4>
            </a>
         </li>
      </ul>
   </div>
   <div class="tab-content">
      <div class="tab-pane fade in active" id="tab-9b1880eb7b9405fed6d"><br />
        <?php if (!empty($summary)) {
          echo '<p>'.$summary.'</p>';
        }
        else {
          echo '<p>Course summary coming soon!</p>';
        } ?>
        <br />
      </div>
      <div class="tab-pane fade" id="tab-8a07a4ba410961af9e2"><br />
        <?php if (!empty($agenda)) {
          echo '<ul class="fusion-checklist fusion-checklist-1" style="font-size:13px;line-height:22.1px;">';
          foreach ($agenda as $concept) {
            echo '<li class="fusion-li-item"><span style="background-color:#3363aa;font-size:11.44px;height:22.1px;width:22.1px;margin-right:9.1px;" class="icon-wrapper circle-yes"><i class="fusion-li-icon fa fa-check" style="color:#ffffff;"></i></span><div class="fusion-li-item-content" style="margin-left:31.2px;">'.$concept.'</div></li>';
          };
          echo '</ul>';
        }
        else {
          echo '<p>Course outline coming soon!</p>';
        } ?><br />
      </div>
      <div class="tab-pane fade" id="tab-119237e103a4367351d"><br />
        <?php if (!empty($audience)) {
          echo '<p>'.$audience.'</p>';
        }
        else {
          echo '<p>Audience profiles coming soon.</p>';
        }
        if (!empty($prereqs)) {
          echo '<p> Before taking this class, it is recommended that you complete the following classes</p><ul class="fusion-checklist fusion-checklist-1" style="font-size:13px;line-height:22.1px;">';
          foreach ($prereqs as $prereq) {
            echo '<li class="fusion-li-item"><span style="background-color:#3363aa;font-size:11.44px;height:22.1px;width:22.1px;margin-right:9.1px;" class="icon-wrapper circle-yes"><i class="fusion-li-icon fa fa-check" style="color:#ffffff;"></i></span><div class="fusion-li-item-content" style="margin-left:31.2px;"><a href="'.get_the_permalink($prereq).'">'.get_the_title($prereq).'</a></div></li>';
          };
          echo '</ul><p>Not sure whether you should take this class? Give us a call at 850-668-4090</p>';
        }
          ?>
      </div>
   </div>
</div>
