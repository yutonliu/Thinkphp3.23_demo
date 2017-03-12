<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	*@brief 查询
	****/
    public function index(){
    	
    	/**
    	*关联查询
    	*/
    	// $result = M()->table(array('表1'=>'表1缩写','表2'=>'表2缩写'))
    	// 			 ->field('表1缩写.字段1,表2缩写.字段2')
    	// 			 ->where('表2缩写.wb_id=表1缩写.id')->select()

    	// $result = M()->table(array('think_form'=>'f','think_data'=>'d'))
    	// ->field('f.*,d.*')
    	// ->where('d.form_id=f.form_id')
    	// ->select();

    	// var_dump($result);
/*************************************************************/

		$choose = I('choose','-6');
		$c['easy_hard'] = $choose;
    	
    	// var_dump($choose);

    	$type=I('typeid','');

    	// var_dump($type);

    	$nowpage=I('page',1);

    	if($type == '')
    	{
    		if($choose == -6)
    		{
    			$totalpage=ceil((D('data')->count())/10);
	    		$infos=D('data')->limit(($nowpage-1)*10,10)->select();				
    		}else{
    			$totalpage=ceil((D('data')->where($c)->count())/10);
	    		$infos=D('data')->where($c)->limit(($nowpage-1)*10,10)->select();	
    		}
    
    	}else{
    		if($choose == -6)
    		{
    			$map['data'] = array('like',"%$type%");
    			$totalpage=ceil((D('data')->where($map)->count())/10);
	    		$infos=D('data')->where($map)->limit(($nowpage-1)*10,10)->select();			
    		}else{
    			$map['data'] = array('like',"%$type%");
    			$totalpage=ceil((D('data')->where($map)->where($c)->count())/10);
	    		$infos=D('data')->where($map)->where($c)->limit(($nowpage-1)*10,10)->select();
    		}
    	
    	}
		$this->assign('type',$type);    	
    	$this->assign('choose',$choose);
    	$this->assign("totalpage",$totalpage);
        $this->assign("infos",$infos);
    	$this -> display();
    }

    /**
    * @brief 删除
    ***/
    public function delMessage()
    {
   
    	$id = I('id');
    	$data = D('data');
   
    	$c['is_deleted'] = 1;
    	$del = $data -> where("id=$id") -> save($c);
   
    	if($del)
    	{
    		$this->ajaxReturn(array('status'=>0));	
    	}else{
    		$this->ajaxReturn(array('status'=>1));
    	}
    	
    }

    /***
    * @brief 修改
    **/
    public function editMessagae()
    {
    	$id = I('id');

    	

    	$data = D('data') -> find($id);

    	
    	$this -> ajaxReturn($data);
    }

    public function changeMessage()
    {
    	
    	$id = I('id');
    	$c['data'] = I('lang');
    	$data = D('data') -> where("id=$id");
    	if($data->save($c))
    	{
    		$this -> ajaxReturn(array('status'=>0));
    	}else{
    		$this -> ajaxReturn(array('status'=>1));
    	}
    }

    /**
    * @brief 增加
    **/
    public function addMessage()
    {
    	
    	$info['data'] = I('add_info');
    	$data = D('data');
    	if($data->add($info))
    	{
    		$this -> ajaxReturn(array('status'=>0));
    	}else{
    		$this -> ajaxReturn(array('status'=>1));
    	}
    }

}