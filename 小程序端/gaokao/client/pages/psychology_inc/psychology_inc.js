// pages/gaolao/xinliceshi.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    psy:[
      
    ]
  },

  jump_out:function(e){
    let that=this
    var index = e.currentTarget.dataset.key;
    wx.navigateTo({
      url: '../out/out?url=' + that.data.psy[index].psy_url,
    })
  },

  //向后台请求数据
  search: function (e) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    let that = this;
    wx.request({
      url: app.globalData.url +'/Psychology_inc.php',
      data: {
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        var psy_list = res.data;
        var length = psy_list.length;
        var psy_fake = new Array();
        for (var i = 0; i < length; i++) {
          var myArray = {
            psy_title: psy_list[i]['psy_title'], psy_content: psy_list[i]['psy_content'], psy_url: psy_list[i]['psy_url']
          };
          psy_fake.push(myArray)
        }
        that.setData({
          psy:psy_fake
        })
        wx.hideLoading()
      }
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    this.search()
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