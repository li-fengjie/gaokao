
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    sch_id: '',//学校Id
    sch_name: '东莞理工学院',//学校名
    sch_images: 'https://gkcx.eol.cn/upload/schoollogo/291.jpg',//学校logo
    sch_beijing: 'http://www.mtdg.club/wwwroot/ftp/裕祺/images/gaokao/3dc417fbb776466fa536ba8311799cb9.jpg',//学校背景
    sch_address: '广东省东莞市松山湖区大学路1号',//学校地址
    sch_brief: 'Dongguan University Of Technology',//学校语录
    sch_details: '东莞理工学院是广东东莞市的第一所普通本科院校，省市共建，以市为主，由诺贝尔物理学奖获得者杨振宁博士任名誉校长 。学校于1990年筹办。1992年4月，经原国家教委批准成立。2002年3月，经教育部批准变更为本科全日制普通高等院校。2006年5月，获批成为学士学位授予单位。2008年5月，提前参加教育部本科教学工作水平评估并以良好成绩通过。2010年6月，与清华大学等61所高校一起被批准为教育部第一批“卓越工程师教育培养计划”实施高校。2010年8月，获批成为广东省立项建设的新增硕士学位授予单位。2012年，获批为“广东省国际科技合作基地”。2015年7月，化学工程与技术、计算机科学与技术、电子科学与技术3个一级学科被授予高等学校副教授评审权。2015年9月被确定为第一批省市共建高水平理工科大学建设单位。',//学校简介
    sch_type: '理工类',//学校类型
    sch_code: '11819',//学校代码
    sch_super: 0,//学校层次
    arrangement: '本科一批',
    arrangement_num: 0,
    arrangement_list: [
      '本科一批', '本科二批', '本科三批', '专科'
    ],
    province: '广东',
    province_list: [
      '请选择您所在的省市', '山东', '江苏', '上海', '浙江', '安徽', '福建', '江西', '广东', '广西', '海南', '河南', '湖南', '湖北', '北京', '天津', '河北', '山西', '内蒙古', '宁夏', '青海', '陕西', '甘肃', '新疆', '四川', '贵州', '云南', '重庆', '西藏', '辽宁', '吉林', '黑龙江'
    ],
    type_list: [
      '文科',
      '理科'
    ],
    type: '文科',
    type_num: 0,
    college_grade: [
      { year: "2017", average: "---", min: "---", line: "---" },
      { year: "2016", average: "---", min: "---", line: "---" },
      { year: "2015", average: "---", min: "---", line: "---" },
    ],
    major: []
  },


  arrangement_change: function (e) {
    let that = this;
    var arrangement_fake = that.data.arrangement_list[e.detail.value]
    this.setData({
      arrangement: arrangement_fake,
      arrangement_num: e.detail.value
    })
  },

  type_change: function (e) {
    let that = this;
    var type_fake = that.data.type_list[e.detail.value]
    this.setData({
      type: type_fake,
      type_num: e.detail.value
    })
  },

  province_change: function (e) {
    let that = this;
    if (e.detail.value != 0) {
      var province_fake = that.data.province_list[e.detail.value]
      this.setData({
        province: province_fake
      })
    }
  },

  //搜索分数向后台请求数据
  search: function (e) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    var that = this
    wx.request({
      url: app.globalData.url +'/College.php',
      data: {
        sch_id: that.data.sch_id,
        inp_province: that.data.province,
        inp_select: that.data.type_num,
        inp_batch: that.data.arrangement_num,
      },
      method: 'GET',
      header: {
        'content-type': 'application/json'
      },
      success: function (res) {
        var average_2015 = "college_grade[0].average"
        var average_2016 = "college_grade[1].average"
        var average_2017 = "college_grade[2].average"
        var min_2015 = "college_grade[0].min"
        var min_2016 = "college_grade[1].min"
        var min_2017 = "college_grade[2].min"
        var line_2015 = "college_grade[0].line"
        var line_2016 = "college_grade[1].line"
        var line_2017 = "college_grade[2].line"
        that.setData({
          [average_2015]: res.data['inp_avera'],
          [average_2016]: res.data['inp_averb'],
          [average_2017]: res.data['inp_averc'],
          [min_2015]: res.data['inp_mina'],
          [min_2016]: res.data['inp_minb'],
          [min_2017]: res.data['inp_minc'],
          [line_2015]: res.data['pro_graa'],
          [line_2016]: res.data['pro_grab'],
          [line_2017]: res.data['pro_grac'],
        })
        wx.hideLoading()
      },
      fail: function (error) {
      }
    })
  },


  //向后台请求大学基本数据
  get_college: function (e) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    let that = this
    wx.request({
      url: app.globalData.url +'/College.php',
      data: {
        sch_id: that.data.sch_id,
        inp_province: that.data.province,
        inp_select: that.data.type_num,
        inp_batch: that.data.arrangement_num,
      },
      header: {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        var major_info = res.data['major_all'];
        console.log(res.data)
        var average_2015 = "college_grade[0].average"
        var average_2016 = "college_grade[1].average"
        var average_2017 = "college_grade[2].average"
        var min_2015 = "college_grade[0].min"
        var min_2016 = "college_grade[1].min"
        var min_2017 = "college_grade[2].min"
        var line_2015 = "college_grade[0].line"
        var line_2016 = "college_grade[1].line"
        var line_2017 = "college_grade[2].line"
        var major_fake = new Array()
        var length = major_info.length
        for (var i = 0; i < length; i++) {
          var myArray = {
            sp_proid: major_info[i]['spp_proid'], name: major_info[i]['spp_proname']
          }
          major_fake.push(myArray)
        }
        that.setData({
          sch_name: res.data['sch_name'],
          sch_images: res.data['sch_images'],
          sch_beijing: res.data['sch_beijing'],
          sch_address: res.data['sch_address'],
          sch_brief: res.data['sch_brief'],
          sch_details: res.data['sch_details'],
          sch_code: res.data['sch_code'],
          sch_super: res.data['sch_super'],
          [average_2015]: res.data['inp_avera'],
          [average_2016]: res.data['inp_averb'],
          [average_2017]: res.data['inp_averc'],
          [min_2015]: res.data['inp_mina'],
          [min_2016]: res.data['inp_minb'],
          [min_2017]: res.data['inp_minc'],
          [line_2015]: res.data['pro_graa'],
          [line_2016]: res.data['pro_grab'],
          [line_2017]: res.data['pro_grac'],
          major: major_fake
        })
        wx.hideLoading()
      },
      fail: function (error) {
      }
    })
  },

  jumpmajor: function (e) {
    var index = e.currentTarget.dataset.key;
    wx.navigateTo({
      url: '../college_major/college_major?sp_proid=' + index,
    })
  },


  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    let that=this
    if (options.sch_id) {
      that.setData({
        sch_id: options.sch_id
      })
      that.get_college()
    }
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