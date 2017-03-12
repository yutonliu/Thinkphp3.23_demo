<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Think Demo</title>
	<script type="text/javascript" src="/Public/jquery-1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/jquery-1.11.1/jquery.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/laypage/laypage.js"></script>
</head>
<body>
<div>
 <select name="" id="slc1" onchange="return choose()">
 	<option value="-6" <?php if($choose == -6 ): ?>selected<?php endif; ?> >全部</option>
 	<option value="0"  <?php if($choose == 0 ): ?>selected<?php endif; ?> >简单</option>
 	<option value="1"  <?php if($choose == 1 ): ?>selected<?php endif; ?> >一般</option>
 </select>
	<input type="text" value="<?php if($type != '' ): echo ($type); endif; ?>" id="type"><button id="sou">搜索</button>
</div>
<!-- <?php echo ($type); ?> -->
<br>
	<table border="1" width="500" height="150" >
				<tr>
					<th>ID</th>
					<th>语言</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($infos)): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<th><?php echo ($vo["id"]); ?></th>
					<th><?php echo ($vo["data"]); ?></th>
					<th>
						<a href="javascript:;" onclick="return del(<?php echo ($vo["id"]); ?>);">删除</a>
						<a href="javascript:;" onclick="return edit(<?php echo ($vo["id"]); ?>);">修改</a>
					</th>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div style="margin-top:15px; text-align:center;" id="page11"></div>
	<button onclick="return add_()"> 添加 </button> <br />
<script type="text/javascript">
	function choose()
	{
		// alert(1234);
		var type=$("#type").val();
		var checkValue=$("#slc1").val(); 
		// alert(checkValue);
		window.location.href="?typeid="+type+"&choose="+checkValue;
	} 

	$("#sou").bind("click",function(event){
	    // event.preventDefault();//这里不懂的可以自己查查（用于取消事件的默认行为 一般是有<from>时，没有就直接去掉）。
	    var type=$("#type").val();//获取假设的搜索条件值
	    // var url=location.host;//这里的是获取点击是要跳转的地址（例如：souid="<*:U('Custom/customorder')*>" 跳转地址自己换）
	    var checkValue=$("#slc1").val(); 
	    window.location.href="?typeid="+type+'&choose='+checkValue;
	});

	$(function(){
			laypage({
			    cont: 'page11',
			    pages: <?php echo ($totalpage); ?>, //假设我们获取到的是18（后端计算完总页数后将总页数值传过来，放在这里即可（类似<?php echo ($totalpage); ?>））.
			 curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
				 var page = location.search.match(/page=(\d+)/);
				        return page ? page[1] : 1;//如果没有页数显示时，默认是第一页
				    }(), 
				    jump: function(e, first){ //触发分页后的回调
				        if(!first){ //一定要加此判断，否则初始时会无限刷新
				            location.href=setParam("page",e.curr);
				        }
				    }
			});
	});

	function setParam(param,value){
	    var query = location.search.substring(1);
	    var p = new RegExp("(^|)" + param + "=([^&]*)(|$)");
	    if(p.test(query)){
	        //query = query.replace(p,"$1="+value);
	        var firstParam=query.split(param)[0];
	        var secondParam=query.split(param)[1];
	        if(secondParam.indexOf("&")>-1){
	            var lastPraam=secondParam.split("&")[1];
	            return  '?'+firstParam+'&'+param+'='+value+'&'+lastPraam;
	        }else{
	            if(firstParam){
	                return '?'+firstParam+''+param+'='+value;
	            }else{
	                return '?'+param+'='+value;
	            }
	        }
	    }else{
	        if(query == ''){
	            return '?'+param+'='+value;
	        }else{
	            return '?'+query+'&'+param+'='+value;
	        }
	    }    
	}



	function add_()
	{
		var infos = '<div id="add_id">编程语言:<input type="text" value="" id="add_info"><br/><button onclick="return add()">保存</button></div>';
		layer.open({
				  title : '增加',
				  type: 1,
				  skin: 'layui-layer-rim', //加上边框
				  area: ['420px', '240px'], //宽高
				  content: infos
		});
	}
	function add()
	{
		var add_info = $('#add_info').val();
		// layer.msg(add_info);
		// return false;
		$.ajax({
			url : '<?php echo U(addMessage);?>',
			dataType : 'json',
			type : 'post',
			data : {
				add_info : add_info
			},
			success : function(data)
			{
				if(data.status == 0)
				{
					layer.msg('添加成功');
					location.reload();
				}else{
					layer.msg('添加失败');
				}
			},
			error : function(data)
			{

			}
		});
	}

	function del(id)
	{
		var index = layer.load(0, {shade: false});
		$.ajax({
			url : '<?php echo U("Index/delMessage");?>',
			type : 'post',
			dataType : 'json',
			data : {
				id : id
			},
			success : function(data)
			{
				console.log(data.status);
				if(data.status == 0)
				{
				    layer.close(index);
					layer.msg('ok');

					// location.href="http://blog.ytlwin.top";
					location.reload();
				}
			},
			error : function(data)
			{
				// alert('500异常');
			}
		});
	}

	function edit(id)
	{
		$.ajax({
			url : '<?php echo U("Index/editMessagae");?>',
			type : 'post',
			dataType : 'json',
			data : {
				id : id
			},
			success : function(data)
			{
				// console.log(data.id);
				// console.log(data.data);
				// $('#num').attr('disabled',true);
				// $('#num').val(data.id);
				// $('#lang').val(data.data);
				var edit_content = '<div id="edit" >ID值：<input type="text" value='+data.id+' id="num" disabled><br /> <br />编程语言：<input type="text" value='+data.data+' name="lang"></div><button onclick="return change('+data.id+');">修改</button>';
				layer.open({
				  title : '编辑',
				  type: 1,
				  skin: 'layui-layer-rim', //加上边框
				  area: ['420px', '240px'], //宽高
				  content: edit_content
				});

			},
			error : function(data)
			{

			}
		});

	}
	function change(id)
	{
		console.log('<?php echo U(changeMessage);?>');
		var lang = $("input[name='lang']").val();
		$.ajax({
			url : '<?php echo U(changeMessage);?>',
			type : 'post',
			dataType : 'json',
			data : {
				lang :  lang,
				id : id
			},
			success : function(data)
			{
				console.log(data.status);
				if(data.status == 0)
				{
					location.reload();
				}else{
					layer.msg('修改失败');
				}
			},
			error : function(data)
			{
				layer.msg('500异常');
			}
		});
	}
</script>
</body>
</html>