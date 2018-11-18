<div class="container">
           <?php while($a = $articles->fetch()) {  
                   $current = intval ($a['id_article']) ?>
						<div id="currentarticle" class="p-3" style="margin-bottom:50px;">
								<div class="card mb-3" >
										<div class="card-header" style="font-weight:bold;"><h3><?=$a['titrepost'] ?></h3></div>
												<div class="card-body">
														<p class="card-text">
															<h4 style="font-weight:bold;"><?=$a['titrepost'] ?></h4>
															<hr/>								
															<p><?=$a['textepost'] ?></p>
															<hr/>
															<p style="color:lightgray;">Rédigé par <?=$a['auteurpost'] ?>, le <?=$a['datepost'] ?>. </p> 
															<br/>
															<button id="<?php echo $a['id_article']; ?>" class="commentbutton btn btn-primary" >Voir les commentaires</button>								
															<button id="<?php echo $a['id_article']; ?>" class="seecommentbutton btn btn-success"  data-toggle="modal" data-target="#myModalNorm">Poster un commentaire</button>
															<div>
															<span> Validation sous 24h maximum </span>
															</div>
												</div>
                            
											       
																	<?php 
																	
																	$comments = $bdd->prepare('SELECT * FROM commentaire WHERE parent_id = 0 && validate = 1 && id_article = :current ORDER BY commentairedate ASC LIMIT 0, 10');
																	$comments->execute(array('current'=>$current));	
																	?>
																						
																	<?php while($c = $comments->fetch()) { 
																						 
																		$answer = intval($c['id_commentaire']);
																		
																	?> 
											
										<div class="comments<?php echo $a['id_article']; ?>" style="margin-bottom:100px; display:none;">
												<div style=" width:90%;background-color: #E9ECEF;color:#000;margin-top:5%;margin-bottom:5%; margin-left:5%; border:1px solid lightgray; padding: 10px;">
														<h5 class="mt-3 mb-3"><?=$c['commentairetexte'] ?></h5>
																	
															<br/>
															<p class="mt-3"style="color:#000;">Rédigé par <?=$c['pseudo'] ?>, le <?=$c['commentairedate'] ?>. </p>

														    <a type="submit" name="repondre" href="answer.php?id_commentaire=<?=$c['id_commentaire']?>&id_article=<?=$a['id_article']?>&validate=<?=$c['validate']?>" class="btn btn-success"> Répondre au commentaire </a>
																					
															<br/>
																	<?php $reponse = $bdd->prepare('SELECT * FROM commentaire WHERE validate = 1 && parent_id = :answer   ORDER BY commentairedate asc');	
																		  $reponse->execute(array('answer'=>$answer));
																	?>	
																	<?php while($r = $reponse->fetch()) { 
																							 
																					 $answer = $r['id_commentaire'];
																			
																	?> 
																					
																				
														<div style="width:80%;box-shadow: 10px 10px 5px 0px #656565;border-radius:3px;background-color:#fff;color:#000;margin-left:10%; margin-top:5%;margin-bottom:5%; padding: 10px;">					
																	
																	<?=$r['commentairetexte']?>	
																	<hr/>
																	<p style="color:black;">Rédigé par <?=$r['pseudo']?>, le <?=$r['commentairedate'] ?>. </p>
																	<hr/>
																					 
														</div>
													<?php } ?> 
												</div>	 		
											<?php } ?>	 
										</div>								
									<?php } ?> 		  
								 </div>											 
							</div>