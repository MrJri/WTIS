                                <div class="table-responsive">
                                <?php   if(!$this->cart->contents()):
                                        echo '<h6 class="text-center">No Data</h1>';
                                        else: ?>
                                    <?php   echo form_open('siswa/update_cart'); ?>
                                        <table class="table table-bordered">
                                            <thead >
                                                <tr>
                                                    <th>Alat</th>
                                                    
                                                    <th>Jumlah</th>
                                                    <!--<th>Total</th>-->
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php  $a=0; $b=0;foreach($this->cart->contents() as $items): ?>
                                                    
                                                    <tr>
                                                        <!--<input type="hidden" id="id_peminjam" name="id_peminjam" value="'.$this->session->userdata('ses_id').'"/>-->
                                                        <td><?php   echo form_hidden('rowid['.$a.']', $items['rowid']); 
                                                                    echo $items['name']; ?></td>
                                                        <td><?php   echo form_input(array('name' => 'qty['.$a.']', 'value' => $items['qty'], 'maxlength' => '2'), '', 'class="form-control form-control-sm"'); ?></td>
                                                        <!--<td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>-->
                                                        <td><?php   echo form_submit('', 'Update', 'class="btn btn-accept btn-sm"');
                                                                    $b=$a+1;?>
                                                    </tr>
                                                <?php   $a++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php   echo form_hidden('jumlah_alat', $b);
                                            echo form_close();?>
                                    <?php   echo form_open('siswa/sub_cart'); ?>
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    <select name="id_guru" class="form-control form-control-sm">
                                                        <option>Pilih Guru</option>
                                                        <?php foreach($guru as $gurus): echo '<option value='.$gurus->id_akun.'>'. $gurus->nama .'</option>'; endforeach;?>
                                                    </select> 
                                                </td>
                                                <td>
                                                    <?php  $hitung=0; $b=0; foreach($this->cart->contents() as $items): ?>
                                                    <?php echo form_hidden('id_alat'.$hitung.'', $items['id']); ?>
                                                    <?php echo form_hidden('jumlah_pinjam'.$hitung.'', $items['qty']); ?>
                                                    <?php echo form_hidden('id_siswa', $this->session->userdata('ses_id')); ?>
                                                    <?php $b=$hitung+1; ?>
                                                    <?php $hitung++; ?>
                                                    <?php endforeach; ?>
                                                    <?php echo form_hidden('jumlah_alat', $b); ?>
                                                    <?php echo anchor('siswa/empty_cart', 'Hapus Semua', 'class="btn btn-danger btn-sm col-sm-5"'); ?>
                                                    <?php echo form_submit('', 'Pinjam!', 'class="btn btn-primary btn-sm col-sm-5"');?>            
                                                </td>
                                            </tr>
                                        </table>
                                    <?php   echo form_close(); ?>
                                </div>
                                <?php endif;?>