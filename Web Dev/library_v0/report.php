<?php 
	$FormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
	    $FormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}
	if($_POST){
		$seyear = $_POST['seyear'];
    $seMonth = $_POST['seMonth'];
	}else{
		$seyear = date('Y');
    $seMonth = date('m');
	}

	  $sql = "SELECT DISTINCT YEAR(br_date) as year FROM tb_borrow";
    $dbquery = mysql_query($sql);
    if ($dbquery === FALSE) {
        die(mysql_error()); // TODO: better error handling
    }
    $rows = array();
    while (($result = mysql_fetch_array($dbquery)) !== FALSE)
        $rows[] = $result['year'];    
    for ($i=01; $i < 13; $i++) { 
    	$brro[] = num_rows("tb_borrow","WHERE month(br_date) = $i and YEAR(br_date) = $seyear");
    	$ret[] = num_rows("tb_borrow","WHERE is_borrow is not null and month(br_date) = $i and YEAR(br_date) = $seyear");

    }
    for ($i=01; $i < date("t", strtotime("01-$seMonth-$seyear"))+1; $i++) { 
      $Daybrro[] = num_rows("tb_borrow","WHERE day(br_date) = $i and month(br_date) = $seMonth and YEAR(br_date) = $seyear");
      $Dayret[] = num_rows("tb_borrow","WHERE is_borrow is not null and day(br_date) = $i and month(br_date) = $seMonth and YEAR(br_date) = $seyear");
      $dayLa[] = $i;
    }
    
    
    $r = array();
    foreach (countMaxBook() as $key => $m) {
      $r[] = array('book' => $m['bookname'],'borrow'=> $m['num_br']);
    }
    foreach (countMaxUser() as $key => $u) {
      $re[] = array('user' => $u['firstname'].' '.$u['lastname'],'borrow'=> $u['num_br']);
    }
    foreach (countMaxViewBook() as $key => $v) {
      $Vre[] = array('book' => $v['bookname'],'r'=> $v['num_v']);
    }
    //{book: 'iPhone 4', geekbench: 380},countMaxViewBook
?>
<div class="row-fluid">
<form name="frmFind" id="frmFind" action="<?= $FormAction; ?>" method="post">
  <div class="span6">
    <div class="well">
        
          <h3 style="text-align: center;">กราฟแสดงข้อมูลการยืมคืนประจำปี 
            <select id="seyear" name="seyear">
              <?php foreach ($rows as $key => $value) : ?>
              <option <?= $sel = ($_POST) ? ($_POST['seyear'] == $value ? 'selected' : '') : (date('Y') == $value ? 'selected' : ''); ?>><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </h3>
        <div id="mainb" style="width:100%; height:280px"></div>    
    </div>
  </div>
  <div class="span6">
    <div class="well">          
          <h3 style="text-align: center;">กราฟแสดงข้อมูลการยืมคืนประจำเดือน
            <select id="seMonth" name="seMonth">
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '01' ? 'selected' : '') : (date('m') == '01' ? 'selected' : ''); ?> value="01">มกราคม</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '02' ? 'selected' : '') : (date('m') == '02' ? 'selected' : ''); ?> value="02">กุมภาพันธ์</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '03' ? 'selected' : '') : (date('m') == '03' ? 'selected' : ''); ?> value="03">มีนาคม</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '04' ? 'selected' : '') : (date('m') == '04' ? 'selected' : ''); ?> value="04">เมษายน</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '05' ? 'selected' : '') : (date('m') == '05' ? 'selected' : ''); ?> value="05">พฤษภาคม</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '06' ? 'selected' : '') : (date('m') == '06' ? 'selected' : ''); ?> value="06">มิถุนายน</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '07' ? 'selected' : '') : (date('m') == '07' ? 'selected' : ''); ?> value="07">กรกฎาคม</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '08' ? 'selected' : '') : (date('m') == '08' ? 'selected' : ''); ?> value="08">สิงหาคม</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '09' ? 'selected' : '') : (date('m') == '09' ? 'selected' : ''); ?> value="09">กันยายน</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '10' ? 'selected' : '') : (date('m') == '10' ? 'selected' : ''); ?> value="10">ตุลาคม</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '11' ? 'selected' : '') : (date('m') == '11' ? 'selected' : ''); ?> value="11">พฤศจิกายน</option>
              <option <?= $sel = ($_POST) ? ($_POST['seMonth'] == '12' ? 'selected' : '') : (date('m') == '12' ? 'selected' : ''); ?> value="12">ธันวาคม</option>
            </select>
          </h3>
        <div id="mainbMonth" style="width:100%; height:280px"></div>  
    </div>
  </div>
  <div class="span4">
    <div class="well">
      <h3 style="text-align: center;">กราฟแสดงข้อมูลหนังสือ TOP 20 อันดับการยืม</h3>
      <div id="graph_bar" style="width:100%; height:280px;"></div>  
    </div>
  </div>
  <div class="span4">
    <div class="well">
      <h3 style="text-align: center;">กราฟแสดงข้อมูลหนังสือ TOP 20 อันดับการดู</h3>
      <div id="graph_bar_view" style="width:100%; height:280px;"></div>
    </div>    
  </div>
  <div class="span4">
    <div class="well">
      <h3 style="text-align: center;">กราฟแสดงข้อมูลผู้ยืม TOP 30 อันดับการยืม</h3>
      <div id="graph_bar_man" style="width:100%; height:280px;"></div>  
    </div>    
  </div>
  </form>
</div>


<script type="text/javascript">
	$("#seyear").change(function (){
		$("#frmFind").submit();	
	})	
  $("#seMonth").change(function (){
    $("#frmFind").submit(); 
  })  
</script>
<script>
      $(document).ready(function() {
        Morris.Bar({
          element: 'graph_bar',
          data: <?=json_encode($r)?>,
          xkey: 'book',
          ykeys: ['borrow'],
          labels: ['จำนวนที่ยืม'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 35,
          hideHover: 'auto',
          resize: true
        });     
        Morris.Bar({
          element: 'graph_bar_view',
          data: <?=json_encode($Vre)?>,
          xkey: 'book',
          ykeys: ['r'],
          labels: ['จำนวนที่ยืม'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 35,
          hideHover: 'auto',
          resize: true
        });
        Morris.Bar({
          element: 'graph_bar_man',
          data: <?=json_encode($re)?>,
          xkey: 'user',
          ykeys: ['borrow'],
          labels: ['จำนวนที่ยืม'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 35,
          hideHover: 'auto',
          resize: true
        });        

      });
theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };
	   var echartBar = echarts.init(document.getElementById('mainb'), theme);
      echartBar.setOption({
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['จำนวนที่ยืม', 'จำนวนที่คืน']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['ม.ค', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค. ', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'จำนวนที่ยืม',
          type: 'bar',
          data: <?=json_encode($brro)?>,
          markPoint: {
            data: [{
              type: 'max',
              name: '???'
            }, {
              type: 'min',
              name: '???'
            }]
          }
        }, {
          name: 'จำนวนที่คืน',
          type: 'bar',
          data: <?=json_encode($ret)?>,
          markPoint: {
            data: [{
              type: 'max',
              name: '???'
            }, {
              type: 'min',
              name: '???'
            }]
          }
        }]
      });
      var echartMonth = echarts.init(document.getElementById('mainbMonth'), theme);
      echartMonth.setOption({
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['จำนวนที่ยืม', 'จำนวนที่คืน']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: <?=json_encode($dayLa)?>
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'จำนวนที่ยืม',
          type: 'bar',
          data: <?=json_encode($Daybrro)?>,
          markPoint: {
            data: [{
              type: 'max',
              name: '???'
            }, {
              type: 'min',
              name: '???'
            }]
          }
        }, {
          name: 'จำนวนที่คืน',
          type: 'bar',
          data: <?=json_encode($Dayret)?>,
          markPoint: {
            data: [{
              type: 'max',
              name: '???'
            }, {
              type: 'min',
              name: '???'
            }]
          }
        }]
      });

</script>