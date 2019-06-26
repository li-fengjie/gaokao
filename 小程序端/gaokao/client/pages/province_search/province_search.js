// pages/province_search/province_search.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
      province:[
        [{ row: 0, col: 0, name: "山东", shock: false }, { row: 0, col: 1, name: "江苏", shock: false }, { row: 0, col: 2, name: "上海", shock: false }],
        [{ row: 1, col: 0, name: "浙江", shock: false }, { row: 1, col: 1, name: "安徽", shock: false }, { row: 1, col: 2, name: "福建", shock: false }],
        [{ row: 2, col: 0, name: "江西", shock: false }, { row: 2, col: 1, name: "广东", shock: false }, { row: 2, col: 2, name: "广西", shock: false }],
        [{ row: 3, col: 0, name: "海南", shock: false }, { row: 3, col: 1, name: "河南", shock: false }, { row: 3, col: 2, name: "湖南", shock: false }],
        [{ row: 4, col: 0, name: "湖北", shock: false }, { row: 4, col: 1, name: "北京", shock: false }, { row: 4, col: 2, name: "天津", shock: false }],
        [{ row: 5, col: 0, name: "河北", shock: false }, { row: 5, col: 1, name: "山西", shock: false }, { row: 5, col: 2, name: "内蒙古", shock: false }],
        [{ row: 6, col: 0, name: "宁夏", shock: false }, { row: 6, col: 1, name: "青海", shock: false }, { row: 6, col: 2, name: "陕西", shock: false }],
        [{ row: 7, col: 0, name: "甘肃", shock: false }, { row: 7, col: 1, name: "新疆", shock: false }, { row: 7, col: 2, name: "四川", shock: false }],
        [{ row: 8, col: 0, name: "贵州", shock: false }, { row: 8, col: 1, name: "云南", shock: false }, { row: 8, col: 2, name: "重庆", shock: false }],
        [{ row: 9, col: 0, name: "西藏", shock: false }, { row: 9, col: 1, name: "辽宁", shock: false }, { row: 9, col: 2, name: "吉林", shock: false }],
        [{ row: 10, col: 0, name: "黑龙江", shock: false }],
      ],
      source: '',
  },

  list_shock: function (e) {
    let that = this;
    var row = e.currentTarget.dataset.row;
    var col = e.currentTarget.dataset.col;
    var shock = "province[" + row + "]["+col+"].shock";
    var province_name = that.data.province[row][col].name;
    that.setData({
      [shock]: true
    })

    setTimeout(function () {
      let pages = getCurrentPages();
      let prevPage = pages[pages.length - 2];
      var source = "" + that.data.source
      prevPage.setData({
        [source]: province_name
      })
      wx.navigateBack({
        delta: 1
      })
    }, 200);
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    let that = this;
    if (options.source) {
      that.setData({
        source: options.source
      })
      
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