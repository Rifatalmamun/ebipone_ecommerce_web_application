



@extends('admin.master')
@section('content')



	@if($flag==1)
	
	<main>
            <div class="container-fluid site-width">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <h5>Customer id not found in system database! Admin delete this customer for unwanted activity!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </main>
	

	@else

	<main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Edit Customer Data. 
                                
                                    @if ($customer->email_verified_at!=null)
                                        <span class="font-weight-bold text-success" style="font-size: 18px;"> Email Verified <i class="fas fa-check-double"></i></span>

                                    @else
                                    <span class="font-weight-bold text-danger" style="font-size: 18px;"> Email Not Verified! <i class="fas fa-exclamation-triangle"></i>
                                    
                                        <a href="{{URL::to('admin/verify/user/email/'.$customer->id)}}" style="font-size: 16px; text-decoration: underline;">Click to veriry!</a>
                                        
                                    </span>

                                    @endif

                            </h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Customer</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                        @php
                                    $note = DB::table('customer_notes')->where('user_id',$customer->id)->orderBy('id','DESC')->get();
                                   // dd($note);
                                @endphp

                                <br>
                                @foreach ($note as $n)
                                    <span class="badge p-2 badge-secondary mb-1">{{$n->note}} ({{$n->date}}-{{$n->time}})</span> 
                                @endforeach	
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-2 text-info font-weight-bold">Customer Data | Quick Edit</h6> 
 				
				                @if ($errors->any())
                                    <h6 style="font-size: 14px;" class="font-weight-bold text-danger mt-2">Error occured! Check error message</h6>
                                @endif	
			
			            </div>
                        
                        <div class="card">
                            <div class="card-body">

				

                                <form action="{{route('admin.update.customer')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$customer->id}}">

                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="main balance">Main Balance ৳</label>

                                                @if ($customer->user_balance==null)
                                                    <input id="main balance" type="number" min="0" class="form-control" value="0" name="user_balance" required step="any">
                                                @else
                                                    <input id="main balance" type="number" min="0" class="form-control" value="{{$customer->user_balance}}" name="user_balance" required step="any">   
                                                @endif

                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="user_cashback" class="font-weight-bold">Cashback Balance ৳</label>

                                                @if ($customer->user_cashback==null)
                                                    <input id="user_cashback" type="number" min="0" class="form-control" value="0" name="user_cashback" required step="any">
                                                @else
                                                    <input id="user_cashback" type="number" min="0" class="form-control" value="{{$customer->user_cashback}}" name="user_cashback" required step="any">  
                                                @endif

                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="user_giftbalance" class="font-weight-bold">Gift Balance ৳</label>
                                                
                                                
                                                @if ($customer->user_giftbalance==null)
                                                    <input id="user_giftbalance" type="number" min="0" class="form-control" value="0" name="user_giftbalance" required step="any">
                                                @else
                                                    <input id="user_giftbalance" type="number" min="0" class="form-control" value="{{$customer->user_giftbalance}}" name="user_giftbalance" required step="any">  
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gift_pending" class="font-weight-bold">Gift Pending Balance ৳</label>

                                                @if ($customer->gift_pending==null)
                                                    <input id="gift_pending" type="number" min="0" class="form-control" value="{{$customer->gift_pending}}" name="gift_pending" required step="any">
                                                @else
                                                    <input id="gift_pending" type="number" min="0" class="form-control" value="{{$customer->gift_pending}}" name="gift_pending" required step="any"> 
                                                @endif

                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3"> 
                                            <div class="form-group">
                                                <label class="font-weight-bold">Name</label>
                                                <input type="text" class="form-control" value="{{$customer->name}}" name="name">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Email</label>
                                                <input type="email" class="form-control" value="{{$customer->email}}" name="email" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Phone</label>
                                                <input type="number" class="form-control" value="{{$customer->phone}}" name="phone" required>

                                                @if ($errors->has('phone'))
                                                                <span style="font-size: 10px;" class="text-danger font-weight-bold">{{ $errors->first('phone') }}</span>
                                                @endif
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Area/Village</label>
                                                <input type="text" class="form-control" value="{{$customer->village}}" name="village">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Post Code</label>
                                                <input type="number" class="form-control" value="{{$customer->postcode}}" name="postcode">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Thana</label>
                                                <input type="text" class="form-control" value="{{$customer->ps}}" name="ps">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-bold">District</label>
                                                <select class="form-control" name="district" id="district">
                                                    
                                                    <option value="">--Select one--</option>
                                                                <option value="Barguna" <?php if($customer->district=='Barguna') echo 'selected'; ?>>Barguna</option>
                                                                <option value="Barisal" <?php if($customer->district=='Barisal') echo 'selected'; ?>>Barisal</option>
                                                                <option value="Jhalokati" <?php if($customer->district=='Jhalokati') echo 'selected'; ?>>Jhalokati</option>
                                                                <option value="Patuakhali" <?php if($customer->district=='Patuakhali') echo 'selected'; ?>>Patuakhali</option>
                                                                <option value="Pirojpur" <?php if($customer->district=='Pirojpur') echo 'selected'; ?>>Pirojpur</option>
                                                                <option value="Bandarban" <?php if($customer->district=='Bandarban') echo 'selected'; ?>>Bandarban</option>
                                                                <option value="Brahmanbaria" <?php if($customer->district=='Brahmanbaria') echo 'selected'; ?>>Brahmanbaria</option>
                                                                <option value="Chandpur" <?php if($customer->district=='Chandpur') echo 'selected'; ?>>Chandpur</option>
                                                                <option value="Chittagong" <?php if($customer->district=='Chittagong') echo 'selected'; ?>>Chittagong</option>
                                                                <option value="Comilla" <?php if($customer->district=='Comilla') echo 'selected'; ?>>Comilla</option>
                                                                <option value="Cox\'s Bazar" <?php if($customer->district=='Cox\'s Bazar') echo 'selected'; ?>>Cox's Bazar</option>
                                                                <option value="Feni" <?php if($customer->district=='Feni') echo 'selected'; ?>>Feni</option>
                                                                <option value="Khagrachhari" <?php if($customer->district=='Khagrachhari') echo 'selected'; ?>>Khagrachhari</option>
                                                                <option value="Lakshmipur" <?php if($customer->district=='Lakshmipur') echo 'selected'; ?>>Lakshmipur</option>
                                                                <option value="Noakhali" <?php if($customer->district=='Noakhali') echo 'selected'; ?>>Noakhali</option>
                                                                <option value="Rangamati" <?php if($customer->district=='Rangamati') echo 'selected'; ?>>Rangamati</option>
                                                                <option value="Dhaka" <?php if($customer->district=='Dhaka') echo 'selected'; ?>>Dhaka</option>
                                                                <option value="Faridpur" <?php if($customer->district=='Faridpur') echo 'selected'; ?>>Faridpur</option>
                                                                <option value="Gazipur" <?php if($customer->district=='Gazipur') echo 'selected'; ?>>Gazipur</option>
                                                                <option value="Gopalganj" <?php if($customer->district=='Gopalganj') echo 'selected'; ?>>Gopalganj</option>
                                                                <option value="Kishoreganj" <?php if($customer->district=='Kishoreganj') echo 'selected'; ?>>Kishoreganj</option>
                                                                <option value="Madaripur" <?php if($customer->district=='Madaripur') echo 'selected'; ?>>Madaripur</option>
                                                                <option value="Manikganj" <?php if($customer->district=='Manikganj') echo 'selected'; ?>>Manikganj</option>
                                                                <option value="Munshiganj" <?php if($customer->district=='Munshiganj') echo 'selected'; ?>>Munshiganj</option>
                                                                <option value="Narayanganj" <?php if($customer->district=='Narayanganj') echo 'selected'; ?>>Narayanganj</option>
                                                                <option value="Narsingdi" <?php if($customer->district=='Narsingdi') echo 'selected'; ?>>Narsingdi</option>
                                                                <option value="Rajbari" <?php if($customer->district=='Rajbari') echo 'selected'; ?>>Rajbari</option>
                                                                <option value="Shariatpur" <?php if($customer->district=='Shariatpur') echo 'selected'; ?>>Shariatpur</option>
                                                                <option value="Tangail" <?php if($customer->district=='Tangail') echo 'selected'; ?>>Tangail</option>
                                                                <option value="Bagerhat" <?php if($customer->district=='Bagerhat') echo 'selected'; ?>>Bagerhat</option>
                                                                <option value="Chuadanga" <?php if($customer->district=='Chuadanga') echo 'selected'; ?>>Chuadanga</option>
                                                                <option value="Jessore" <?php if($customer->district=='Jessore') echo 'selected'; ?>>Jessore</option>
                                                                <option value="Jhenaidah" <?php if($customer->district=='Jhenaidah') echo 'selected'; ?>>Jhenaidah</option>
                                                                <option value="Khulna" <?php if($customer->district=='Khulna') echo 'selected'; ?>>Khulna</option>
                                                                <option value="Kushtia" <?php if($customer->district=='Kushtia') echo 'selected'; ?>>Kushtia</option>
                                                                <option value="Magura" <?php if($customer->district=='Magura') echo 'selected'; ?>>Magura</option>
                                                                <option value="Meherpur" <?php if($customer->district=='Meherpur') echo 'selected'; ?>>Meherpur</option>
                                                                <option value="Narail" <?php if($customer->district=='Narail') echo 'selected'; ?>>Narail</option>
                                                                <option value="Satkhira" <?php if($customer->district=='Satkhira') echo 'selected'; ?>>Satkhira</option>
                                                                <option value="Jamalpur" <?php if($customer->district=='Jamalpur') echo 'selected'; ?>>Jamalpur</option>
                                                                <option value="Mymensingh" <?php if($customer->district=='Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                                                                <option value="Netrokona" <?php if($customer->district=='Netrokona') echo 'selected'; ?>>Netrokona</option>
                                                                <option value="Sherpur" <?php if($customer->district=='Sherpur') echo 'selected'; ?>>Sherpur</option>
                                                                <option value="Bogra" <?php if($customer->district=='Bogra') echo 'selected'; ?>>Bogra</option>
                                                                <option value="Joypurhat" <?php if($customer->district=='Joypurhat') echo 'selected'; ?>>Joypurhat</option>
                                                                <option value="Naogaon" <?php if($customer->district=='Naogaon') echo 'selected'; ?>>Naogaon</option>
                                                                <option value="Natore" <?php if($customer->district=='Natore') echo 'selected'; ?>>Natore</option>
                                                                <option value="Chapainawabganj" <?php if($customer->district=='Chapainawabganj') echo 'selected'; ?>>Chapainawabganj</option>
                                                                <option value="Pabna" <?php if($customer->district=='Pabna') echo 'selected'; ?>>Pabna</option>
                                                                <option value="Rajshahi" <?php if($customer->district=='Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                                                <option value="Sirajganj" <?php if($customer->district=='Sirajganj') echo 'selected'; ?>>Sirajganj</option>
                                                                <option value="Dinajpur" <?php if($customer->district=='Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                                                                <option value="Gaibandha" <?php if($customer->district=='Gaibandha') echo 'selected'; ?>>Gaibandha</option>
                                                                <option value="Kurigram" <?php if($customer->district=='Kurigram') echo 'selected'; ?>>Kurigram</option>
                                                                <option value="Lalmonirhat" <?php if($customer->district=='Lalmonirhat') echo 'selected'; ?>>Lalmonirhat</option>
                                                                <option value="Nilphamari" <?php if($customer->district=='Nilphamari') echo 'selected'; ?>>Nilphamari</option>
                                                                <option value="Panchagarh" <?php if($customer->district=='Panchagarh') echo 'selected'; ?>>Panchagarh</option>
                                                                <option value="Rangpur" <?php if($customer->district=='Rangpur') echo 'selected'; ?>>Rangpur</option>
                                                                <option value="Thakurgaon" <?php if($customer->district=='Thakurgaon') echo 'selected'; ?>>Thakurgaon</option>
                                                                <option value="Habiganj" <?php if($customer->district=='Habiganj') echo 'selected'; ?>>Habiganj</option>
                                                                <option value="Moulvibazar" <?php if($customer->district=='Moulvibazar') echo 'selected'; ?>>Moulvibazar</option>
                                                                <option value="Sunamganj" <?php if($customer->district=='Sunamganj') echo 'selected'; ?>>Sunamganj</option>
                                                                <option value="Sylhet" <?php if($customer->district=='Sylhet') echo 'selected'; ?>>Sylhet</option>



                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">

                                                <label class="font-weight-bold">Customer Address</label>                 
                                                <textarea class="form-control" name="address" id="customer_address" rows="3">{{$customer->address}}</textarea>

                                                
                                            </div>
                                        </div>

					
					                <div class="col-md-3">
                                        <div class="form-group">

                                            <label class="font-weight-bold">Add Customer Note</label>                 
                                            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                        </div>

                                    </div>					


                                        
                                        
                                    </div>
                                    
                                    <input type="submit" class="btn btn-primary w-25 mb-2" value="Update Customer Data">
                                    <br>
                                    <a href="{{URL::to('admin/view/customer/'.$customer->id)}}" class="text-danger font-weight-bold">View Customer</a>

				
                                </form>
                            </div>
                        </div>
                    
                    </div>
                </div>



            </div>
        </main>


	@endif


        
        

@endsection
