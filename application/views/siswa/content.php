                        <div class="card mb-3">
                            <h4 class="card-header">List Pinjam</h4>    
                                <div class="table-responsive">
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
                                            <?php $a=0; $b=0; foreach ($this->cart->contents() as $items) { ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="rowid[<?php echo $a; ?>]" value="<?php echo $items['rowid']; ?>">
                                                        <?php echo $items['name']; ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="qty[<?php echo $a; ?>]" value="<?php echo $items['qty']; ?>" maxlength="2" class="form-control form-control-sm">
                                                    </td>
                                                    <td>
                                                        <input type="submit" value="Update" class="btn btn-primary btn-sm">
                                                    <?php $b=$a+1; $a++;?>
                                                </tr>
                                            <?php } echo '<input type="hidden" name ="jumlah_alat" value="'.$b.'">' ?>
                                            </tbody>
                                        </table>
                                    <?php   echo form_close();?>
                                    <?php   echo form_open('siswa/sub_cart'); ?>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <select name="id_guru" class="form-control form-control-sm">
                                                        <option>Pilih Guru</option>
                                                        <?php   foreach($guru as $gurus): 
                                                                    echo '<option value='.$gurus->id_akun.'>'. 
                                                                    $gurus->nama .'</option>'; 
                                                                endforeach;?>
                                                    </select> 
                                                </td>
                                                <td>
                                                    <?php $hitung=0; $b=0;
                                                        foreach($this->cart->contents() as $items):
                                                        echo form_hidden('id_alat'.$hitung.'', $items['id']); 
                                                        echo form_hidden('jumlah_pinjam'.$hitung.'', $items['qty']); 
                                                        $b=$hitung+1; 
                                                        $hitung++; 
                                                        endforeach; 
                                                        echo form_hidden('jumlah_alat', $b); 
                                                        echo anchor('siswa/destroy_cart', 'Hapus Semua', 'class="btn btn-danger btn-sm col-sm-5"'); 
                                                        //echo anchor('siswa/destroy_cart', 'Hapus Semua', 'class="btn btn-danger btn-sm col-sm-5"'); 
                                                        echo form_submit('', 'Pinjam!', 'class="btn btn-primary btn-sm col-sm-5"');
                                                        //echo form_submit('', 'Pinjam!', 'class="btn btn-primary btn-sm col-sm-5"'); ?>
                                                </td>
                                            </tr> 
                                        </table>  
                                    <?php   echo form_close();?> 
                                </div>
                            <div class="card-footer small text-muted">
                                Jika jumlah alat nya 0(nol), alat akan dihapus. Page rendered in <strong>{elapsed_time}</strong> seconds.
                            </div>
                        </div>