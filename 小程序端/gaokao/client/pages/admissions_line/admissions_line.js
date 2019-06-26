// pages/admissions_line/admissions_line.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    arrangement: '本科二批',
    arrangement_num: 1,
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
    type: '理科',
    type_num: 1,
    px: 0,
    school: '大连海事大学',
    line: [
      { year: "2015", grade: 519, y: 0 }, { year: "2016", grade: 402, y: 0 }, { year: "2017", grade: 360, y: 0 },
    ]
  },

  school_change: function (e) {
    wx.navigateTo({
      url: '../college_search/college_search?source=admissions',
    })
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

  getrpx: function (e) {
    var that = this;
    var width = wx.getSystemInfoSync().windowWidth;
    var px_fake = width / 750;
    that.setData({
      px: px_fake
    })
  },

  line_ctx: function (e) {
    var ponit_x = new Array(3);
    var ponit_y = new Array(3);
    var that = this;
    var px = that.data.px;
    const ctx = wx.createCanvasContext('myCanvas');

    ponit_y[0] = 154 - that.data.line[0].grade / 750 * 154;
    ponit_x[0] = px * 110;
    ctx.moveTo(ponit_x[0], ponit_y[0]);

    ponit_x[1] = px * 330;
    ponit_y[1] = 154 - that.data.line[1].grade / 750 * 154;
    ctx.lineTo(ponit_x[1], ponit_y[1]);

    ponit_x[2] = px * 550;
    ponit_y[2] = 154 - that.data.line[2].grade / 750 * 154;
    ctx.lineTo(ponit_x[2], ponit_y[2]);
    ctx.setStrokeStyle("#1C7F75");
    ctx.setLineWidth(2);
    ctx.stroke()

    for (var i = 0; i < 3; i++) {
      ctx.beginPath();
      ctx.arc(ponit_x[i], ponit_y[i], 5, 0, 2 * Math.PI);
      ctx.setFillStyle('#55c4b8');
      ctx.fill();

      var line_y = "line[" + i + "].y";
      that.setData({
        [line_y]: ponit_y[i]
      })
    }
    ctx.draw();
  },


  //向后台请求数据
  search: function (e) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    var that = this
    wx.request({
      url: app.globalData.url + '/Admissions_line.php',
      data: {
        sch_name: that.data.school,
        inp_province: that.data.province,
        inp_batch: that.data.arrangement_num,
        inp_select: that.data.type_num,
      },
      header: {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        var line_list = res.data;
        console.log(res.data)
        if (res.data == 0) {
          wx.showToast({
            title: '搜索失败请尝试其他选项',
            icon: 'none',
          })
        }
        else {
          var min_2015 = "line[0].grade"
          var min_2016 = "line[1].grade"
          var min_2017 = "line[2].grade"
          that.setData({
            [min_2015]: line_list['inp_mina'],
            [min_2016]: line_list['inp_minb'],
            [min_2017]: line_list['inp_minc']
          });
        }
        wx.hideLoading()
      },
      fail: function () {
      }
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    that.getrpx();
    that.line_ctx();
    that.search()
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