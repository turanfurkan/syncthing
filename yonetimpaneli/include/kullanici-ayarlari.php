
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kullanıcı Ayarları</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kullanıcı Ayarları</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     
       <?php
       $users=$VT-> VeriGetir("users","WHERE user_id=?",array(1),"ORDER BY user_id ASC");
       if(!empty($users[0]["user_image"]))
       {
        $c_user_image=$users[0]["user_image"];
       }
       else
       {
           $c_user_image="user.png";
       }
       
	   if($_POST)
	   {
		   if(!empty($_POST["user_full_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_password"]))
		   {
			   $user_full_name=$VT->filter($_POST["user_full_name"]);
			   $user_email=$VT->filter($_POST["user_email"]);
			   $user_passwordtekrar=$VT->filter($_POST["user_passwordtekrar"]);
			   if (!empty($_FILES["user_image"]["name"])) {
                                function dosyaYukleBack($takeFile, $newfilenameback)
                                {
                                    move_uploaded_file($takeFile["tmp_name"], "uploads/home/" . $newfilenameback);
                                    return $newfilenameback;
                                }
                                $tempback = explode(".", $_FILES["user_image"]["name"]);
                                $randback = uniqid(true);
                                $newfilenameback = $randback . '.' . end($tempback);


                                $user_image = dosyaYukleBack($_FILES["user_image"], $newfilenameback);
                            } else {
                                $user_image = $c_user_image;
                            }
                $user_password=$VT->filter($_POST["user_password"]);
                if($user_password==$user_passwordtekrar)
                {
                $user_passwordhash=md5($user_password);
			   
				   $guncelle=$VT->SorguCalistir("UPDATE users","SET user_full_name=?, user_image=?, user_email=?, user_password=? WHERE user_id=?",array($user_full_name, $user_image,$user_email,$user_passwordhash,1),1);
			  
			   if($guncelle!=false)
			   {
				    ?>
                   <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                   <meta http-equiv="refresh" content="1;url=<?=SITE?>kullanici-ayarlari" />
                   <?php
			   }
			   else
			   {
				    ?>
                   <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                   <?php
			   }
                }
                else
                {
                    ?>
                   <div class="alert alert-danger">Şifreler Uyuşmuyor.</div>
                   <?php
                }
		   }
		   else
		   {
			   ?>
               <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
               <?php
		   }
	   }
	   ?>
       <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
       <div class="col-md-8">
       <div class="card-body card card-primary">
            <div class="row">
              
            <div class="col-md-12">
                <div class="form-group">
                <label>İsim Soyisim</label>
                <input type="text" class="form-control" placeholder="İsim Soyisim ..." name="user_full_name" value="<?=$users[0]["user_full_name"]?>">
                </div>
            </div>
           
             <div class="col-md-12">
                <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="user_email ..." name="user_email" value="<?=$users[0]["user_email"]?>">
                </div>
            </div>
            <div class="col-md-12">
                                        <img class="img-fluid" width="200" src="<?=SITE?>uploads/home/<?= $c_user_image ?>">

                                        <div class="form-group">
                                            <label>Kullanıcı Görseli</label>
                                            <input type="file" class="form-control" value="<?= $c_user_image ?>" name="user_image">
                                        </div>
                                    </div>
             <div class="col-md-12">
                <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control" placeholder="Şifre ..." name="user_password" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Şifre Tekrar</label>
                <input type="password" class="form-control" placeholder="Şifre ..." name="user_passwordtekrar" >
                </div>
            </div>
           
            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">GÜNCELLE</button>
                </div>
            </div>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        </div>
       </form>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
