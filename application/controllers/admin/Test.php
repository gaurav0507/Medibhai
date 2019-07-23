<?php

public function add_mapping()
	{
		$data['pincode'] = json_decode($this->Delivery_model->pincode(),true);
		$data['delivery_boy'] = json_decode($this->Delivery_model->delivery_boy(),true);
		
		if($this->input->post('save'))
        {
			//$pincode = $this->input->post('pincode');
		    //$db_array = $this->input->post('Delivery_boy');
			
			$delivery_boy = $this->input->post('Delivery_boy');
			$db_array = $this->input->post('pincode');
			
			//$this->form_validation->set_rules('pincode', 'Pincode', 'required');
			//$this->form_validation->set_rules('Delivery_boy', 'Delivery boy', 'callback_select_validate');
			
			$this->form_validation->set_rules('pincode', 'pincode', 'callback_select_validate');
			$this->form_validation->set_rules('Delivery_boy', 'Delivery boy', 'required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Mapping_delivery',$data);
			}
			else
			{
				$results = $this->Delivery_model->mapping($delivery_boy,$db_array);
				if($results == 1)
				{
					$this->session->set_flashdata('message',array('message'=>'Delivery Boy Mapped Successfully','class'=>'label label-success'));
                    redirect('admin/Delivery/Mapping_Delivery');
				}
				else
				{
					$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                    redirect('admin/Delivery/Mapping_Delivery');
				}
			}
		}
		else
		{
			
		}
		
	}
	
	
	
	?>