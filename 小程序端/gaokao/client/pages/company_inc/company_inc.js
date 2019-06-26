// pages/gaolao/gongsixiangxi.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {

      company_id:'',
      name: '高考派',
      motto: '',
      url: 'http://www.gaokaopai.com/',
      back:'../../images/1505464508.jpg',
      info:'体验保障——免费一次评估半小时面对面,效果保障——专家审核，确保最佳方案,真实保障——全职名师，一对一指导',
      logo:'../../images/logo.png',
  },

  jump_out: function (e) {
    let that = this
    wx.navigateTo({
      url: '../out/out?url=' + that.data.url,
    })
  },

  //向后台请求数据
  company_get:function(e){
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    var that = this
    wx.request({
      url: app.globalData.url +'/Company_inc.php',
      data: {
        com_id: that.data.company_id,
      },
      header: {
        'content-type': 'application/json'
      },
      method:'GET',
      success: function (res) {
        console.log(res.data)
        var company = res.data;
        that.setData({ 
          name: company['com_name'],
          url: company['com_url'],
          back: company['com_beijing'],
          info: company['com_details'],
          logo: company['com_images']
         })
        wx.hideLoading()
      },
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    let that=this;
    if (options.id) {
      that.setData({
        company_id: options.id
      })
      this.company_get()
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