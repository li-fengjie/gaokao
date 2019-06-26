// pages/major_watch/major_watch.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    major: [
      { name: '哲学', code: '01',id:'1' },
      { name: '经济学', code: '02', id: '2'},
      { name: '法学', code: '03', id: '3'},
      { name: '教育学', code: '04', id: '4'},
      { name: '文学', code: '05', id: '5'},
      { name: '历史学', code: '06', id: '6'},
      { name: '理学', code: '07', id: '7'},
      { name: '工学', code: '08', id: '8'},
      { name: '农学', code: '09', id: '9'},
      { name: '医学', code: '10', id: '10'},
      { name: '军事学', code: '11', id: '11'},
      { name: '管理学', code: '12', id: '12' },
      { name: '艺术学', code: '13', id: '13' },
    ]
  },

  major_son_watch:function(e){
    var index = e.currentTarget.dataset.key;
      wx.navigateTo({
        url: '../major_watch_son/major_watch_son?code=' + this.data.major[index].id,
      })
  },

  

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

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