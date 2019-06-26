// pages/twobest/twobest.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    now_index: -2,
    toView: 'major_son0',
    curtain: false,
    now_inc: true,//true为大学,false为学科
    major_open: false,//公司三元运算
    college_open: true,//大学三元运算
    ani_start: false,//页面切换动画开关
    height_W: 0,
    college_A: [
      { front: '', behind: '', name: '北京大学' }, { front: '', behind: '', name: '中国人民大学' }, { front: '', behind: '', name: '清华大学' }, { front: '', behind: '', name: '北京航空航天大学' }, { front: '', behind: '', name: '北京理工大学' }, { front: '', behind: '', name: '中国农业大学' }, { front: '', behind: '', name: '北京师范大学' }, { front: '', behind: '', name: '中央民族大学' }, { front: '', behind: '', name: '南开大学' }, { front: '', behind: '', name: '天津大学' }, { front: '', behind: '', name: '大连理工大学' }, { front: '', behind: '', name: '吉林大学' }, { front: '', behind: '', name: '哈尔滨工业大学' }, { front: '', behind: '', name: '复旦大学' }, { front: '', behind: '', name: '同济大学' }, { front: '', behind: '', name: '上海交通大学' }, { front: '', behind: '', name: '华东师范大学' }, { front: '', behind: '', name: '南京大学' }, { front: '', behind: '', name: '东南大学' }, { front: '', behind: '', name: '浙江大学' }, { front: '', behind: '', name: '中国科学技术大学' }, { front: '', behind: '', name: '厦门大学' }, { front: '', behind: '', name: '山东大学' }, { front: '', behind: '', name: '中国海洋大学' }, { front: '', behind: '', name: '武汉大学' }, { front: '', behind: '', name: '华中科技大学' }, { front: '', behind: '', name: '中南大学' }, { front: '', behind: '', name: '中山大学' }, { front: '', behind: '', name: '华南理工大学' }, { front: '', behind: '', name: '四川大学	' }, { front: '', behind: '', name: '电子科技大学' }, { front: '', behind: '', name: '重庆大学' }, { front: '', behind: '', name: '西安交通大学' }, { front: '', behind: '', name: '西北工业大学' }, { front: '', behind: '', name: '兰州大学' }, { front: '', behind: '', name: '国防科技大学' },
    ],
    college_B: [
      { front: '', behind: '', name: '东北大学' }, { front: '', behind: '', name: '郑州大学' }, { front: '', behind: '', name: '湖南大学' }, { front: '', behind: '', name: '云南大学' }, { front: '', behind: '', name: '西北农林科技大学' }, { front: '', behind: '', name: '新疆大学' }
    ],

    college_major: [{ front: '', behind: '', spread: false, slide: false, name: '北京大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国人民大学' }, { front: '', behind: '', spread: false, slide: false, name: '清华大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京交通大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京工业大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京航空航天大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京科技大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京化工大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京邮电大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国农业大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京林业大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京协和医学院' }, { front: '', behind: '', spread: false, slide: false, name: '北京中医药大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '首都师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京外国语大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国传媒大学' }, { front: '', behind: '', spread: false, slide: false, name: '中央财经大学' }, { front: '', behind: '', spread: false, slide: false, name: '对外经济贸易大学' }, { front: '', behind: '', spread: false, slide: false, name: '外交学院' }, { front: '', behind: '', spread: false, slide: false, name: '中国人民公安大学' }, { front: '', behind: '', spread: false, slide: false, name: '北京体育大学' }, { front: '', behind: '', spread: false, slide: false, name: '中央音乐学院' }, { front: '', behind: '', spread: false, slide: false, name: '中国音乐学院' }, { front: '', behind: '', spread: false, slide: false, name: '中央美术学院' }, { front: '', behind: '', spread: false, slide: false, name: '中央戏剧学院' }, { front: '', behind: '', spread: false, slide: false, name: '中央民族大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国政法大学' }, { front: '', behind: '', spread: false, slide: false, name: '南开大学' }, { front: '', behind: '', spread: false, slide: false, name: '天津大学' }, { front: '', behind: '', spread: false, slide: false, name: '天津工业大学' }, { front: '', behind: '', spread: false, slide: false, name: '天津医科大学' }, { front: '', behind: '', spread: false, slide: false, name: '天津中医药大学' }, { front: '', behind: '', spread: false, slide: false, name: '华北电力大学' }, { front: '', behind: '', spread: false, slide: false, name: '河北工业大学' }, { front: '', behind: '', spread: false, slide: false, name: '太原理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '内蒙古大学' }, { front: '', behind: '', spread: false, slide: false, name: '辽宁大学' }, { front: '', behind: '', spread: false, slide: false, name: '大连理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '东北大学' }, { front: '', behind: '', spread: false, slide: false, name: '大连海事大学' },

    { front: '', behind: '', spread: false, slide: false, name: '吉林大学' }, { front: '', behind: '', spread: false, slide: false, name: '延边大学' }, { front: '', behind: '', spread: false, slide: false, name: '东北师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '哈尔滨工业大学' }, { front: '', behind: '', spread: false, slide: false, name: '哈尔滨工程大学' }, { front: '', behind: '', spread: false, slide: false, name: '东北农业大学' }, { front: '', behind: '', spread: false, slide: false, name: '东北林业大学' }, { front: '', behind: '', spread: false, slide: false, name: '复旦大学' }, { front: '', behind: '', spread: false, slide: false, name: '同济大学' }, { front: '', behind: '', spread: false, slide: false, name: '上海交通大学' }, { front: '', behind: '', spread: false, slide: false, name: '华东理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '东华大学' }, { front: '', behind: '', spread: false, slide: false, name: '上海海洋大学' }, { front: '', behind: '', spread: false, slide: false, name: '上海中医药大学' }, { front: '', behind: '', spread: false, slide: false, name: '华东师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '上海外国语大学' }, { front: '', behind: '', spread: false, slide: false, name: '上海财经大学' }, { front: '', behind: '', spread: false, slide: false, name: '上海体育学院' }, { front: '', behind: '', spread: false, slide: false, name: '上海音乐学院' }, { front: '', behind: '', spread: false, slide: false, name: '上海大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京大学' }, { front: '', behind: '', spread: false, slide: false, name: '苏州大学' }, { front: '', behind: '', spread: false, slide: false, name: '东南大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京航空航天大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国矿业大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京邮电大学' }, { front: '', behind: '', spread: false, slide: false, name: '河海大学' }, { front: '', behind: '', spread: false, slide: false, name: '江南大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京林业大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京信息工程大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京农业大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京中医药大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国药科大学' }, { front: '', behind: '', spread: false, slide: false, name: '南京师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '浙江大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国美术学院' }, { front: '', behind: '', spread: false, slide: false, name: '安徽大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国科学技术大学' }, { front: '', behind: '', spread: false, slide: false, name: '合肥工业大学' }, { front: '', behind: '', spread: false, slide: false, name: '厦门大学' }, { front: '', behind: '', spread: false, slide: false, name: '福州大学' },

    { front: '', behind: '', spread: false, slide: false, name: '南昌大学' }, { front: '', behind: '', spread: false, slide: false, name: '山东大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国海洋大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国石油大学' }, { front: '', behind: '', spread: false, slide: false, name: '郑州大学' }, { front: '', behind: '', spread: false, slide: false, name: '河南大学' }, { front: '', behind: '', spread: false, slide: false, name: '武汉大学' }, { front: '', behind: '', spread: false, slide: false, name: '华中科技大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国地质大学' }, { front: '', behind: '', spread: false, slide: false, name: '武汉理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '华中农业大学' }, { front: '', behind: '', spread: false, slide: false, name: '华中师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '中南财经政法大学' }, { front: '', behind: '', spread: false, slide: false, name: '湖南大学' }, { front: '', behind: '', spread: false, slide: false, name: '中南大学' }, { front: '', behind: '', spread: false, slide: false, name: '湖南师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '中山大学' }, { front: '', behind: '', spread: false, slide: false, name: '暨南大学' }, { front: '', behind: '', spread: false, slide: false, name: '华南理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '广州中医药大学' }, { front: '', behind: '', spread: false, slide: false, name: '华南师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '海南大学' }, { front: '', behind: '', spread: false, slide: false, name: '广西大学' }, { front: '', behind: '', spread: false, slide: false, name: '四川大学' }, { front: '', behind: '', spread: false, slide: false, name: '重庆大学' }, { front: '', behind: '', spread: false, slide: false, name: '西南交通大学' }, { front: '', behind: '', spread: false, slide: false, name: '电子科技大学' }, { front: '', behind: '', spread: false, slide: false, name: '西南石油大学' }, { front: '', behind: '', spread: false, slide: false, name: '成都理工大学' }, { front: '', behind: '', spread: false, slide: false, name: '四川农业大学' }, { front: '', behind: '', spread: false, slide: false, name: '成都中医药大学' }, { front: '', behind: '', spread: false, slide: false, name: '西南大学' }, { front: '', behind: '', spread: false, slide: false, name: '西南财经大学' }, { front: '', behind: '', spread: false, slide: false, name: '贵州大学' }, { front: '', behind: '', spread: false, slide: false, name: '云南大学' }, { front: '', behind: '', spread: false, slide: false, name: '西藏大学' }, { front: '', behind: '', spread: false, slide: false, name: '西北大学' }, { front: '', behind: '', spread: false, slide: false, name: '西安交通大学' }, { front: '', behind: '', spread: false, slide: false, name: '西北工业大学' }, { front: '', behind: '', spread: false, slide: false, name: '西安电子科技大学' }, { front: '', behind: '', spread: false, slide: false, name: '长安大学' }, { front: '', behind: '', spread: false, slide: false, name: '西北农林科技大学' }, { front: '', behind: '', spread: false, slide: false, name: '陕西师范大学' }, { front: '', behind: '', spread: false, slide: false, name: '兰州大学' }, { front: '', behind: '', spread: false, slide: false, name: '青海大学' }, { front: '', behind: '', spread: false, slide: false, name: '宁夏大学' }, { front: '', behind: '', spread: false, slide: false, name: '新疆大学' }, { front: '', behind: '', spread: false, slide: false, name: '石河子大学' }, { front: '', behind: '', spread: false, slide: false, name: '（北京）中国矿业大学' }, { front: '', behind: '', spread: false, slide: false, name: '（北京）中国石油大学' }, { front: '', behind: '', spread: false, slide: false, name: '（北京）中国地质大学' }, { front: '', behind: '', spread: false, slide: false, name: '宁波大学' }, { front: '', behind: '', spread: false, slide: false, name: '中国科学院大学' }, { front: '', behind: '', spread: false, slide: false, name: '国防科技大学' }, { front: '', behind: '', spread: false, slide: false, name: '第二军医大学' }, { front: '', behind: '', spread: false, slide: false, name: '第四军医大学' }
    ],

    major: [
      { list: '哲学、理论经济学、应用经济学、法学、政治学、社会学、马克思主义理论、心理学、中国语言文学、外国语言文学、考古学、中国史、世界史、数学、物理学、化学、地理学、地球物理学、地质学、生物学、生态学、统计学、力学、材料科学与工程、电子科学与技术、控制科学与工程、计算机科学与技术、环境科学与工程、软件工程、基础医学、临床医学、口腔医学、公共卫生与预防医学、药学、护理学、艺术学理论、现代语言学、语言学、机械及航空航天和制造工程、商业与管理、社会政策与管理' }, { list: '哲学、理论经济学、应用经济学、法学、政治学、社会学、马克思主义理论、新闻传播学、中国史、统计学、工商管理、农林经济管理、公共管理、图书情报与档案管理' }, { list: '法学、政治学、马克思主义理论、数学、物理学、化学、生物学、力学、机械工程、仪器科学与技术、材料科学与工程、动力工程及工程热物理、电气工程、信息与通信工程、控制科学与工程、计算机科学与技术、建筑学、土木工程、水利工程、化学工程与技术、核科学与技术、环境科学与工程、生物医学工程、城乡规划学、风景园林学、软件工程、管理科学与工程、工商管理、公共管理、设计学、会计与金融、经济学和计量经济学、统计学与运筹学、现代语言学' }, { list: '系统科学' }, { list: '土木工程（自定）' }, { list: '力学、仪器科学与技术、材料科学与工程、控制科学与工程、计算机科学与技术、航空宇航科学与技术、软件工程' }, { list: '材料科学与工程、控制科学与工程、兵器科学与技术' }, { list: '科学技术史、材料科学与工程、冶金工程、矿业工程' }, { list: '化学工程与技术（自定）' }, { list: '信息与通信工程、计算机科学与技术' }, { list: '生物学、农业工程、食品科学与工程、作物学、农业资源与环境、植物保护、畜牧学、兽医学、草学' }, { list: '风景园林学、林学' }, { list: '生物学、生物医学工程、临床医学、药学' }, { list: '中医学、中西医结合、中药学' }, { list: '教育学、心理学、中国语言文学、中国史、数学、地理学、系统科学、生态学、环境科学与工程、戏剧与影视学、语言学' }, { list: '数学' }, { list: '外国语言文学' }, { list: '新闻传播学、戏剧与影视学' }, { list: '应用经济学' }, { list: '应用经济学（自定）' }, { list: '政治学（自定）' }, { list: '公安学（自定）' }, { list: '体育学' }, { list: '音乐与舞蹈学' }, { list: '音乐与舞蹈学（自定）' }, { list: '美术学、设计学' }, { list: '戏剧与影视学' }, { list: '民族学' }, { list: '法学' }, { list: '世界史、数学、化学、统计学、材料科学与工程' }, { list: '化学、材料科学与工程、化学工程与技术、管理科学与工程' }, { list: '纺织科学与工程' }, { list: '临床医学（自定）' }, { list: '中药学' }, { list: '电气工程（自定）' }, { list: '电气工程（自定）' }, { list: '化学工程与技术（自定）' }, { list: '生物学（自定）' }, { list: '应用经济学（自定）' }, { list: '化学、工程' }, { list: '控制科学与工程' }, { list: '交通运输工程（自定）' }, { list: '考古学、数学、物理学、化学、材料科学与工程' }, { list: '外国语言文学（自定）' }, { list: '马克思主义理论、世界史、数学、化学、统计学、材料科学与工程' }, { list: '力学、机械工程、材料科学与工程、控制科学与工程、计算机科学与技术、土木工程、环境科学与工程' }, { list: '船舶与海洋工程' }, { list: '畜牧学（自定）' }, { list: '林业工程、林学' }, { list: '哲学、政治学、中国语言文学、中国史、数学、物理学、化学、生物学、生态学、材料科学与工程、环境科学与工程、基础医学、临床医学、中西医结合、药学、机械及航空航天和制造工程、现代语言学' }, { list: '建筑学、土木工程、测绘科学与技术、环境科学与工程、城乡规划学、风景园林学、艺术与设计' }, { list: '数学、化学、生物学、机械工程、材料科学与工程、信息与通信工程、控制科学与工程、计算机科学与技术、土木工程、化学工程与技术、船舶与海洋工程、基础医学、临床医学、口腔医学、药学、电子电气工程、商业与管理' }, { list: '化学、材料科学与工程、化学工程与技术' }, { list: '纺织科学与工程' }, { list: '水产' }, { list: '中医学、中药学' }, { list: '教育学、生态学、统计学' }, { list: '外国语言文学' }, { list: '统计学' }, { list: '体育学' }, { list: '音乐与舞蹈学' }, { list: '机械工程（自定）' }, { list: '哲学、中国语言文学、外国语言文学、物理学、化学、天文学、大气科学、地质学、生物学、材料科学与工程、计算机科学与技术、化学工程与技术、矿业工程、环境科学与工程、图书情报与档案管理' }, { list: '材料科学与工程（自定）' }, { list: '材料科学与工程、电子科学与技术、信息与通信工程、控制科学与工程、计算机科学与技术、建筑学、土木工程、交通运输工程、生物医学工程、风景园林学、艺术学理论' }, { list: '力学' }, { list: '兵器科学与技术' }, { list: '安全科学与工程、矿业工程' }, { list: '电子科学与技术' }, { list: '水利工程、环境科学与工程' }, { list: '轻工技术与工程、食品科学与工程' }, { list: '林业工程' }, { list: '大气科学' }, { list: '作物学、农业资源与环境' }, { list: '中药学' }, { list: '中药学' }, { list: '地理学' }, { list: '化学、生物学、生态学、机械工程、光学工程、材料科学与工程、电气工程、控制科学与工程、计算机科学与技术、农业工程、环境科学与工程、软件工程、园艺学、植物保护、基础医学、药学、管理科学与工程、农林经济管理' }, { list: '美术学' }, { list: '材料科学与工程（自定）' }, { list: '数学、物理学、化学、天文学、地球物理学、生物学、科学技术史、材料科学与工程、计算机科学与技术、核科学与技术、安全科学与工程' }, { list: '管理科学与工程（自定）' }, { list: '化学、海洋科学、生物学、生态学、统计学' }, { list: '化学（自定）' }, { list: '材料科学与工程' }, { list: '数学、化学' }, { list: '海洋科学、水产' }, { list: '石油与天然气工程、地质资源与地质工程' }, { list: '临床医学（自定）、材料科学与工程（自定）、化学（自定）' }, { list: '生物学' }, { list: '理论经济学、法学、马克思主义理论、化学、地球物理学、生物学、测绘科学与技术、矿业工程、口腔医学、图书情报与档案管理' }, { list: '机械工程、光学工程、材料科学与工程、动力工程及工程热物理、电气工程、计算机科学与技术、基础医学、公共卫生与预防医学' }, { list: '地质学、地质资源与地质工程' }, { list: '材料科学与工程' }, { list: '生物学、园艺学、畜牧学、兽医学、农林经济管理' }, { list: '政治学、中国语言文学' }, { list: '法学（自定）' }, { list: '化学、机械工程' }, { list: '数学、材料科学与工程、冶金工程、矿业工程' }, { list: '外国语言文学（自定）' }, { list: '哲学、数学、化学、生物学、生态学、材料科学与工程、电子科学与技术、基础医学、临床医学、药学、工商管理' }, { list: '药学（自定）' }, { list: '化学、材料科学与工程、轻工技术与工程、农学' }, { list: '中医学' }, { list: '物理学' }, { list: '作物学（自定）' }, { list: '土木工程（自定）' }, { list: '数学、化学、材料科学与工程、基础医学、口腔医学、护理学' }, { list: '机械工程（自定）、电气工程（自定）、土木工程（自定）' }, { list: '交通运输工程' }, { list: '电子科学与技术、信息与通信工程' }, { list: '石油与天然气工程' }, { list: '地质学' }, { list: '作物学（自定）' }, { list: '中药学' }, { list: '生物学' }, { list: '应用经济学（自定）' }, { list: '植物保护（自定）' }, { list: '民族学、生态学' }, { list: '生态学（自定）' }, { list: '地质学' }, { list: '力学、机械工程、材料科学与工程、动力工程及工程热物理、电气工程、信息与通信工程、管理科学与工程、工商管理' }, { list: '机械工程、材料科学与工程' }, { list: '信息与通信工程、计算机科学与技术' }, { list: '交通运输工程（自定）' }, { list: '农学' }, { list: '中国语言文学（自定）' }, { list: '化学、大气科学、生态学、草学' }, { list: '生态学（自定）' }, { list: '化学工程与技术（自定）' }, { list: '马克思主义理论（自定）、化学（自定）、计算机科学与技术（自定）' }, { list: '化学工程与技术（自定）' }, { list: '安全科学与工程、矿业工程' }, { list: '石油与天然气工程、地质资源与地质工程' }, { list: '地质学、地质资源与地质工程' }, { list: '力学' }, { list: '化学、材料科学与工程' }, { list: '信息与通信工程、计算机科学与技术、航空宇航科学与技术、软件工程、管理科学与工程' }, { list: '基础医学' }, { list: '临床医学（自定）' }
    ],

    major_list: [
    ]
  },

  //页面切换
  inc_change: function (e) {
    let that = this;
    var inc = that.data.now_inc;
    that.setData({
      major_open: true,
      college_open: true,
      curtain: true,
      ani_start: true,
      now_inc: !inc,
    })
  },


  curtain_close: function (e) {
    var index = e.currentTarget.dataset.key;
    let that = this;
    that.setData({
      curtain: false,
    })
    if (that.data.now_inc)
      that.setData({
        major_open: false,
      })
    else
      that.setData({
        college_open: false,
      })
  },


  major_slide: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    var jump_index = index - 1;
    var spread = "college_major[" + index + "].spread";
    var slide = "college_major[" + index + "].slide";
    var now_index = that.data.now_index
    if (that.data.now_index != index) {
      if (now_index == -2)
        now_index = 0;
      if (now_index != -1) {
        var spread_last = "college_major[" + now_index + "].spread";
        var slide_last = "college_major[" + now_index + "].slide";
        that.setData({
          [spread_last]: false,
          [slide_last]: false,
        })
      }
      that.setData({
        toView: 'major_son' + jump_index + '',
        now_index: index,
        [spread]: true,
        [slide]: true,
      })
    }
  },

  i_flashes: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    var spread = "college_major[" + index + "].spread";
    var spread_bool = that.data.college_major[index].spread;
    that.setData({
      [spread]: !spread_bool
    })
  },


  //科目切割
  major_name: function (e) {
    let that = this;
    var row = 0;
    var major_list_fake = that.data.major_list;
    var length_major = that.data.major.length;
    for (row; row < length_major; row++) {
      var list = that.data.major[row].list;
      var list_after = list.split("、");
      var list_length = list_after.length;
      major_list_fake.push(list_after)
    }
    that.setData({
      major_list: major_list_fake
    })
    wx.hideLoading()
  },

  //  大学名字切割
  college_name: function (e) {
    var that = this;
    var length = that.data.college_A.length;
    for (var i = 0; i < length; i++) {
      var front = "college_A[" + i + "].front";
      var behind = "college_A[" + i + "].behind";
      var front_name = that.data.college_A[i].name.slice(0, -2);
      var behind_name = that.data.college_A[i].name.slice(-2);
      that.setData({
        [front]: front_name,
        [behind]: behind_name
      })
    };
    length = that.data.college_B.length;
    for (var i = 0; i < length; i++) {
      var front = "college_B[" + i + "].front";
      var behind = "college_B[" + i + "].behind";
      var front_name = that.data.college_B[i].name.slice(0, -2);
      var behind_name = that.data.college_B[i].name.slice(-2);
      that.setData({
        [front]: front_name,
        [behind]: behind_name
      })
    };

    length = that.data.college_major.length;
    for (var i = 0; i < length; i++) {
      var front = "college_major[" + i + "].front";
      var behind = "college_major[" + i + "].behind";
      var front_name = that.data.college_major[i].name.slice(0, -2);
      var behind_name = that.data.college_major[i].name.slice(-2);
      that.setData({
        [front]: front_name,
        [behind]: behind_name
      })
    };
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.showLoading({
      title:'数据加载中' ,
      mask:true
    })
    var that = this;
    that.setData({
      height_W: wx.getSystemInfoSync().windowHeight
    })
    that.college_name();
    that.major_name();
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})