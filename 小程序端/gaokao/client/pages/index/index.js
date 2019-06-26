// pages/index/index.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    form_volunteer: '',//志愿专业
    form_grade: '',//分数
    form_grade_fake: '',//暂定分数
    form_location: '',//所在地区
    form_target: '',//志愿地区
    college_name: '',//搜索学校名
    index_data: '',//高考时间
    now_year: '',//当前年
    now_month: '',//当前月
    now_date: '',//当前日
    now_day: '',//当前星期
    day_Differ: '',//相差日

    form_circle_disabled: false,//是否禁用志愿表格
    circle_son_disabled: [{ start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, ani_type: false, transitionend: true }],
    index_navigation_slide: false,//导航栏下滑
    form_submit_move: false,//查询框是否变形
    curtain_transparent_top: false,//是否禁止操作
    index_form_open: false,//表格是否已打开
    index_form_ani_start: false,//圆圈打开动画
    index_form_ani_end: false,//圆圈关闭动画
    ciecle_shock: [{ shock: false }, { shock: false }, { shock: false }, { shock: false }],
    curtain_black_top: false,//输入分数黑色背景禁止操作
    grade_input: false,//分数,大学搜索动画开关
    grade_input_word: false,
    navigation_shadow: [{ start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, transitionend: true }, { start: false, transitionend: true }],//点击导航栏动画
    curtain_university_top: false,//大学搜索黑色背景


  },

  //设置时间
  search: function (e) {
    let that = this;
    wx.request({
      url: app.globalData.url +'/Index.php',
      data: {
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'POST',
      success: function (res) {
        let date = new Date();
        var show_day = new Array('星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六');
        var index_data = res.data;
        var year = date.getFullYear()
        var month = date.getMonth() +1
        var dates = date.getDate()-1
        var day = date.getDay()
        var start_date = new Date(index_data.replace(/-/g, "/"))//高考时间
        var end_date = new Date(year + '/' + month + '/' + dates)//当前时间
        var days = end_date.getTime() - start_date.getTime() //距 1970 年 1 月 1 日之间的毫秒数相减
        var day_Differ = parseInt(days / (1000 * 60 * 60 * 24)); //结果转换为天数
        that.setData({
          index_data: index_data,
          now_year: year,
          now_month: month,
          now_date: dates,
          now_day: show_day[day],
          day_Differ: day_Differ
        });
        wx.hideLoading()
      }
    })
  },

  /*
  time_set: function (e) {
    let that = this;
    let date = new Date();
    var show_day = new Array('星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六');
    var index_data = res.data;
    var year = date.getFullYear()
    var month = date.getMonth() + 1
    var dates = date.getDate()
    var day = date.getDay()

    var start_date = new Date(index_data[0]['data'].replace(/-/g, "/"))//高考时间
    var end_date = new Date(year + '/' + month + '/' + dates)//当前时间
    var days = end_date.getTime() - start_date.getTime() //距 1970 年 1 月 1 日之间的毫秒数相减
    var day_Differ = parseInt(days / (1000 * 60 * 60 * 24)) //结果转换为天数
    that.setData({
      index_data: index_data[0]['data'],
      now_year: year,
      now_month: month,
      now_date: dates,
      now_day: show_day[day],
      day_Differ: day_Differ
    })
  },*/

  //大学评测查询
  recommend_search: function (e) {
    var that = this;
    if (that.data.form_location == '' || that.data.form_volunteer == '' || that.data.form_grade == '' || that.data.form_target == '' )
      wx.showToast({
        title: '还留有空白!',
        icon:'none'
      })
      else
      wx.navigateTo({
        url: '../major_recommend/major_recommend?form_volunteer=' + that.data.form_volunteer + '&form_grade=' + that.data.form_grade + '&form_location=' + that.data.form_location + '&form_target=' + that.data.form_target,
    })
  },

  //导航栏动画
  navigation_shadow_open: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    if (that.data.navigation_shadow[index].transitionend) {
      var transitionend = "navigation_shadow[" + index + "].transitionend"
      that.setData({
        [transitionend]: false,
      })
      var check = "navigation_shadow[" + index + "].start";
      var check_bool = that.data.navigation_shadow[index].start;
      that.setData({
        [check]: !check_bool,
        curtain_transparent_top: true
      });
      if (index == 0) {
        that.setData({
          curtain_university_top: true,
          grade_input: true,
          curtain_transparent_top: false
        })
      }

      setTimeout(function () {
        if (index == 1) {
          wx.navigateTo({
            url: '../major_watch/major_watch',
          })
        }

        else if (index == 2) {
          wx.navigateTo({
            url: '../province_line/province_line',
          })
        }

        else if (index == 3) {
          wx.navigateTo({
            url: '../psychology_inc/psychology_inc',
          })
        }

        else if (index == 4) {
          wx.navigateTo({
            url: '../admissions_line/admissions_line',
          })
        }

        else if (index == 5) {
          wx.navigateTo({
            url: '../twobest/twobest',
          })
        }
      }, 400);
    }
  },


  //导航栏关闭动画
  navigation_shadow_close: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    if (!that.data.navigation_shadow[index].transitionend) {
      var transitionend = "navigation_shadow[" + index + "].transitionend"
      that.setData({
        [transitionend]: true,
      })
      var check = "navigation_shadow[" + index + "].start";
      var check_bool = that.data.navigation_shadow[index].start;
      setTimeout(function () {
        that.setData({
          [check]: !check_bool,
          curtain_transparent_top: false
        });
      }, 10);
    }
  },

  //小圆打开动画
  circle_son_start: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    if (that.data.circle_son_disabled[index].transitionend) {
      var transitionend = "circle_son_disabled[" + index + "].transitionend"
      that.setData({
        [transitionend]: false,
      })
      if (index == 4) {
        var index_fake = index;
        var ani_type_bool = that.data.circle_son_disabled[index_fake].ani_type;
        var ani_type = "circle_son_disabled[" + index_fake + "].ani_type";
        var checked_fake = "circle_son_disabled[" + index_fake + "].start";
        that.setData({
          [checked_fake]: false,
          [ani_type]: !ani_type_bool,
        })
        that.curtain_transparent_close();
      }
      else if (index != 4) {
        index++;
        var checked = "circle_son_disabled[" + index + "].start";
        var bool = that.data.circle_son_disabled[index].start;
        that.setData({
          [checked]: !bool
        });
      }
    }
  },


  //小圆关闭动画
  circle_son_back: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    if (!that.data.circle_son_disabled[index].transitionend) {
      var transitionend = "circle_son_disabled[" + index + "].transitionend"
      var transitionend_bool = that.data.circle_son_disabled[index].transitionend;
      that.setData({
        [transitionend]: !transitionend_bool,
      })
      var checked_bool_fake = that.data.circle_son_disabled[4].start;
      if (index == 4 && checked_bool_fake) {
        var index_fake = index;
        var checked_fake = "circle_son_disabled[" + index_fake + "].start";
        that.setData({
          [transitionend]: false,
          [checked_fake]: !checked_bool_fake
        });
      }
      else if (index != 0) {
        index--;
        var checked = "circle_son_disabled[" + index + "].start";
        var checked_bool = that.data.circle_son_disabled[index].start;
        that.setData({
          [checked]: !checked_bool,
        });
      }
      else if (index == 0) {
        var checked = "circle_son_disabled[" + index + "].start";
        that.setData({
          [checked]: false,
        });
        that.ciecle_son_ani_after();
      }
    }
  },



  //小圆关闭后续
  ciecle_son_ani_after: function () {
    var that = this;
    var checked = "circle_son_disabled[0].start";
    that.setData({
      index_navigation_slide: false,
      form_circle_disabled: false,
      index_form_open: false,//设置表格关闭
      [checked]: false
    });
    wx.pageScrollTo({
      scrollTop: 0,
      duration: 200
    });
    that.curtain_transparent_close();
  },

  //关闭禁止操作
  curtain_transparent_close: function () {
    var that = this;
    that.setData({
      curtain_transparent_top: false,
      index_form_ani_start: false,
      index_form_ani_end: false
    });
  },

  //表格打开动画
  form_open: function (options) {
    let that = this;
    var checked = "circle_son_disabled[0].start";
    var bool = that.data.circle_son_disabled[0].start;

    that.setData({
      [checked]: !bool,
      form_circle_disabled: true,
      index_navigation_slide: true,
      curtain_transparent_top: true,//设置禁止操作
      index_form_open: true,//设置表格已打开
      index_form_ani_start: true
    });//设置表格可见


    setTimeout(function () {
      wx.createSelectorQuery().select('#index_form').boundingClientRect(function (rect) {
        wx.pageScrollTo({
          scrollTop: rect.top,
          duration: 200
        })
      }).exec()
    }, 100);//页面滚动
  },


  //表格关闭动画
  form_close: function (options) {
    wx.vibrateShort(Object);
    let that = this;

    var ani_type_bool = that.data.circle_son_disabled[4].ani_type;
    var ani_type = "circle_son_disabled[4].ani_type";
    var checked = "circle_son_disabled[4].start";
    var checked_bool = that.data.circle_son_disabled[4].start;

    that.setData({
      [checked]: !checked_bool,
      [ani_type]: !ani_type_bool,
      curtain_transparent_top: true,//设置禁止操作
      index_form_ani_end: true,
    });//设置表格可见
  },

  //表格圆点击动画
  ciecle_shock: function (e) {
    var that = this;
    var index = e.currentTarget.dataset.key;
    var checked = "ciecle_shock[" + index + "].shock";
    this.setData({
      [checked]: true
    });

    setTimeout(function () {
      that.setData({
        [checked]: false
      });
    }, 300);

    wx.vibrateShort(Object);
    if (index == 1) {
      this.setData({
        grade_input: true,
        curtain_black_top: true,
      });
    }

    setTimeout(function () {
      if (index == 0) {
        wx.navigateTo({
          url: '../major_search/major_search?source=index',
        })
      }

      else if (index == 2) {
        wx.navigateTo({
          url: '../province_search/province_search?source=form_location',
        })
      }

      else if (index == 3) {
        wx.navigateTo({
          url: '../province_search/province_search?source=form_target',
        })
      }
    }, 200);

  },

  //分数设置
  grade_set: function (e) {
    this.setData({
      form_grade_fake: e.detail.value,
    })
  },

  input_word: function () {
    this.setData({
      grade_input_word: true,
    })
  },

  //分数输入关闭
  grade_input_close: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    this.setData({
      grade_input: false,
      grade_input_word: false,
    })

    setTimeout(function () {
      that.setData({
        curtain_black_top: false,
        curtain_university_top: false
      });
      if (index == "check") {
        var form_grade_fake = that.data.form_grade_fake;
        that.setData({
          form_grade: form_grade_fake
        })
      }
      else if (index == "university_close" || index == "university_close") {
        var search = e.currentTarget.dataset.search;
        var check = "navigation_shadow[0].start";
        var check_bool = that.data.navigation_shadow[0].start;
        var transitionend = "navigation_shadow[0].transitionend"
        that.setData({
          [check]: !check_bool,
          [transitionend]: true
        });
        if (search == "true") {
          wx.navigateTo({
            url: '../college_search/college_search?college_name=' + that.data.college_name + '&source=college',
          })
        }
      }
    }, 300);//解除禁止操作
  },

  college_name_set: function (e) {
    let that = this;
    that.setData({
      college_name: e.detail.value
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