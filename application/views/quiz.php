<section class="page-section mb-0 mt-4">
  <div class="container">
      <form role="form" method="post" autocomplete="off" id="submission">
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <?php $i=0; $questionNoValue = $questionNo; foreach ($apiResponse as $result) { $i++; $questionNoValue++; ?>
                  <br>
                  <div class="row">
                    <div class="col-md-8">
                      <p>
                        <?php 
                          echo 'Question No : '.$questionNoValue.") ".$question = $result['question']; 
                          $correctAnswer = $result['correct_answer'];
                        ?>
                      </p>
                    </div>
                    <div class="col-md-4">
                      <i id="<?php echo 'showcorrect'.$i; ?>" class="fas fa-check text-success" style="display: none;"></i>
                      <i id="<?php echo 'showincorrect'.$i; ?>" class="fas fa-times text-danger" style="display: none;"></i>
                    </div>
                  </div>
                  <div id="<?php echo 'data-row-'.$i ?>" 
                        <?php if ($i != 1) { ?> style="display: none;" <?php } ?>>
                  <?php 
                    $incorrectAnswer = $result['incorrect_answers'][0].'$...$'.$result['incorrect_answers'][1].'$...$'.$result['incorrect_answers'][2];

                    $options=explode("$...$",$correctAnswer.'$...$'.$incorrectAnswer);

                    shuffle($options);

                    foreach ($options as $option) { ?>
                      <div class="radio">
                        <label>
                          <input type="radio" value="<?php echo $option; ?>" name="<?php echo "selected[$questionNoValue]";?>" data-value="<?php echo md5($correctAnswer = $result['correct_answer']); ?>" class="<?php echo 'valueno' ?>">&nbsp;<?php echo $option; ?>
                        </label>
                      </div>
                    <?php } ?> </div> <?php } ?>
              </div>
            </div>
        </div>
      </form>
  </div>
</section>