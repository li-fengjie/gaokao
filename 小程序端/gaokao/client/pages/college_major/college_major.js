// pages/college_major/college_major.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    sp_proid:'',
    arrangement: '本科一批',
    arrangement_list: [
      '本科一批', '本科二批', '本科三批', '专科'
    ],
    arrangement_num:-1,
    province: '广东',
    province_list: [
        '请选择您所在的省市','山东', '江苏', '上海', '浙江', '安徽', '福建', '江西', '广东', '广西', '海南', '河南', '湖南', '湖北', '北京', '天津', '河北', '山西', '内蒙古', '宁夏', '青海', '陕西', '甘肃', '新疆', '四川', '贵州', '云南', '重庆', '西藏', '辽宁', '吉林', '黑龙江'
    ],
    type_list: [
      '你是文科还是理科？',
      '理科',
      '文科'
    ],
    type: '理科',
    major:[
      { name: '光电信息科学与工程', avn:'490',level:'本科二批'},
      
    ]
  },

  //向后台请求数据
  search: function (e) {
    let that = this;
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    wx.request({
      url: app.globalData.url +'/College_major.php',
      data: {
        prop_propid: that.data.sp_proid,
        prop_propbatch: that.data.arrangement_num,
        prop_province: that.data.province
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        console.log(res.data)
        var major_list = res.data;
        var length = major_list.length;
        var major_fake = new Array();
        for (var i = 0; i < length; i++) {
          var myArray = {
            name: major_list[i]['prop_propname'], avn: major_list[i]['prop_propgrade'], level: major_list[i]['prop_propbatch']
          };
          major_fake.push(myArray)
        }
        that.setData({
          major: major_fake
        })
        wx.hideLoading()
      }
    })
  },

  arrangement_change: function (e) {
    let that = this;
    if (e.detail.value != 0){
      var arrangement_fake = that.data.arrangement_list[e.detail.value]
      this.setData({
        arrangement: arrangement_fake,
        arrangement_num: e.detail.value
      })
    }
  },

  type_change: function (e) {
    let that = this;
    var type_fake = that.data.type_list[e.detail.value]
    this.setData({
      type: type_fake
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


  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    let that=this
    if (options.sp_proid) {
      that.setData({
        sp_proid: options.sp_proid
      })
      this.search();
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