Delay 1000
FindPic 0,0,500,300,"Attachment:\zb.bmp",0.9,zbX,zbY
If zbX > 0 And zbY > 0 Then

End If
Rem 轮
Dim x
x=0
Rem 开始
UserVar zhengshou=DropList{"否":"1"|"是":"2"}=0 "自动征收"
UserVar nontian=DropList{"否":"1"|"是":"2"}=0"自动占领农田"
UserVar yinkuang=DropList{"否":"1"|"是":"2"}=0 "自动占领银矿"
UserVar xunlian=DropList{"否":"0"|"武将一":"1"|"武将二":"2"|"武将三":"3"|"武将四":"4"}=0 "训练-突飞猛进"

UserVar keji=DropList{"否":"0"|"第一个":"1"|"第二个":"2"|"第三个":"3"|"第四个":"4"|"第五个":"5"|"第六个":"6"|"第七个":"7"|"第八个":"8"|"第九个":"9"|"第十个":"10"|"第十一个":"11"|"第十二个":"12"|"第十三个":"13"}=0 "科技升级（重复）"
UserVar jianzhu1=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑一"
UserVar jianzhu2=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑二"
UserVar jianzhu3=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑三"
UserVar jianzhu4=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑四"
UserVar jianzhu5=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑五"
UserVar jianzhu6=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑六"
UserVar jianzhu7=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑七"
UserVar jianzhu8=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑八"
UserVar jianzhu9=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑九"
UserVar jianzhu10=DropList{"否":"0"|"主城":"1"|"军机处":"2"|"兵营":"3"|"校场":"4"|"商店":"5"|"市场":"6"|"粮仓":"7"|"银库":"8"|"帐房":"9"|"民居一":"10"|"民居二":"11"|"民居三":"12"|"民居四":"13"|"民居五":"14"|"民居六":"15"|"民居七":"16"}=0 "建筑十"
//---------------主程序-----------
//---------------科技-----------
IfColor 49,253,"33cc66",0 Then
    Call 升级科技()
End If
//-------------科技结束-----------
Delay 3000
//---------------征收-----------
If zhengshou=2 Then
    IfColor zbX-206,zbY+123,"33cc66",0 Then
        Call 征收()
    End If
End If
//-------------征收结束-----------
Delay 3000
//---------------训练-----------
If xunlian=2 Then
    IfColor zbX-138,zbY+161,"ffcc33",0 Then
    Else
        Call 突飞猛进()
    End If
End If
//-------------训练结束-----------
Delay 3000
//---------------建筑-----------
IfColor zbX-205,zbY+179,"33cc66",0 Then
    Call 建筑排程()
End If
IfColor zbX-205,zbY+199,"33cc66",0 Then
    Call 建筑排程()
End If
IfColor zbX-205,zbY+218,"33cc66",0 Then
    Call 建筑排程()
End If
//-------------建筑结束-----------
Delay 3000
//---------------农田-----------
If nontian=2 Then
    Call 占领农田()
End If
Rem NT
//-------------农田结束-----------
Delay 3000
//----------------银矿-----------
If yinkuang=2 Then
    Call 银矿占领()
End If
Rem YKZL
//--------------银矿结束-----------
Delay 300000
Goto 开始
//-------------主程序结束-----------
//---------------升级部分-----------
Sub 建筑排程()
    x=x+1
    If x=1 Then
        Call 建筑1()
    End If
    If x=2 Then
        Call 建筑2()
    End If
    If x=3 Then
        Call 建筑3()
    End If
    If x=4 Then
        Call 建筑4()
    End If
    If x=5 Then
        Call 建筑5()
    End If
    If x=6 Then
        Call 建筑6()
    End If
    If x=7 Then
        Call 建筑7()
    End If
    If x=8 Then
        Call 建筑8()
    End If
    If x=9 Then
        Call 建筑9()
    End If
    If x=10 Then
        Call 建筑10()
    End If
End Sub
Sub 建筑1()
    If jianzhu1=1Then
        Call 升级主城()
    End If
    If jianzhu1=2Then
        Call 升级军机处()
    End If
    If jianzhu1=3 Then
        Call 升级兵营()
    End If
    If jianzhu1=4 Then
        Call 升级校场()
    End If
    If jianzhu1=5 Then
        Call 升级商店()
    End If
    If jianzhu1=6 Then
        Call 升级市场()
    End If
    If jianzhu1=7 Then
        Call 升级粮仓()
    End If
    If jianzhu1=8 Then
        Call 升级银库()
    End If
    If jianzhu1=9 Then
        Call 升级帐房()
    End If
    If jianzhu1=10 Then
        Call 升级民房1()
    End If
    If jianzhu1=11 Then
        Call 升级民房2()
    End If
    If jianzhu1=12 Then
        Call 升级民房3()
    End If
    If jianzhu1=13 Then
        Call 升级民房4()
    End If
    If jianzhu1=14 Then
        Call 升级民房5()
    End If
    If jianzhu1=15 Then
        Call 升级民房6()
    End If
    If jianzhu1=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑2()
    If jianzhu2=1Then
        Call 升级主城()
    End If
    If jianzhu2=2Then
        Call 升级军机处()
    End If
    If jianzhu2=3 Then
        Call 升级兵营()
    End If
    If jianzhu2=4 Then
        Call 升级校场()
    End If
    If jianzhu2=5 Then
        Call 升级商店()
    End If
    If jianzhu2=6 Then
        Call 升级市场()
    End If
    If jianzhu2=7 Then
        Call 升级粮仓()
    End If
    If jianzhu2=8 Then
        Call 升级银库()
    End If
    If jianzhu2=9 Then
        Call 升级帐房()
    End If
    If jianzhu2=10 Then
        Call 升级民房1()
    End If
    If jianzhu2=11 Then
        Call 升级民房2()
    End If
    If jianzhu2=12 Then
        Call 升级民房3()
    End If
    If jianzhu2=13 Then
        Call 升级民房4()
    End If
    If jianzhu2=14 Then
        Call 升级民房5()
    End If
    If jianzhu2=15 Then
        Call 升级民房6()
    End If
    If jianzhu2=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑3()
    If jianzhu3=1Then
        Call 升级主城()
    End If
    If jianzhu3=2Then
        Call 升级军机处()
    End If
    If jianzhu3=3 Then
        Call 升级兵营()
    End If
    If jianzhu3=4 Then
        Call 升级校场()
    End If
    If jianzhu3=5 Then
        Call 升级商店()
    End If
    If jianzhu3=6 Then
        Call 升级市场()
    End If
    If jianzhu3=7 Then
        Call 升级粮仓()
    End If
    If jianzhu3=8 Then
        Call 升级银库()
    End If
    If jianzhu3=9 Then
        Call 升级帐房()
    End If
    If jianzhu3=10 Then
        Call 升级民房1()
    End If
    If jianzhu3=11 Then
        Call 升级民房2()
    End If
    If jianzhu3=12 Then
        Call 升级民房3()
    End If
    If jianzhu3=13 Then
        Call 升级民房4()
    End If
    If jianzhu3=14 Then
        Call 升级民房5()
    End If
    If jianzhu3=15 Then
        Call 升级民房6()
    End If
    If jianzhu3=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑4()
    If jianzhu4=1Then
        Call 升级主城()
    End If
    If jianzhu4=2Then
        Call 升级军机处()
    End If
    If jianzhu4=3 Then
        Call 升级兵营()
    End If
    If jianzhu4=4 Then
        Call 升级校场()
    End If
    If jianzhu4=5 Then
        Call 升级商店()
    End If
    If jianzhu4=6 Then
        Call 升级市场()
    End If
    If jianzhu4=7 Then
        Call 升级粮仓()
    End If
    If jianzhu4=8 Then
        Call 升级银库()
    End If
    If jianzhu4=9 Then
        Call 升级帐房()
    End If
    If jianzhu4=10 Then
        Call 升级民房1()
    End If
    If jianzhu4=11 Then
        Call 升级民房2()
    End If
    If jianzhu4=12 Then
        Call 升级民房3()
    End If
    If jianzhu4=13 Then
        Call 升级民房4()
    End If
    If jianzhu4=14 Then
        Call 升级民房5()
    End If
    If jianzhu4=15 Then
        Call 升级民房6()
    End If
    If jianzhu4=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑5()
    If jianzhu5=1Then
        Call 升级主城()
    End If
    If jianzhu5=2Then
        Call 升级军机处()
    End If
    If jianzhu5=3 Then
        Call 升级兵营()
    End If
    If jianzhu5=4 Then
        Call 升级校场()
    End If
    If jianzhu5=5 Then
        Call 升级商店()
    End If
    If jianzhu5=6 Then
        Call 升级市场()
    End If
    If jianzhu5=7 Then
        Call 升级粮仓()
    End If
    If jianzhu5=8 Then
        Call 升级银库()
    End If
    If jianzhu5=9 Then
        Call 升级帐房()
    End If
    If jianzhu5=10 Then
        Call 升级民房1()
    End If
    If jianzhu5=11 Then
        Call 升级民房2()
    End If
    If jianzhu5=12 Then
        Call 升级民房3()
    End If
    If jianzhu5=13 Then
        Call 升级民房4()
    End If
    If jianzhu5=14 Then
        Call 升级民房5()
    End If
    If jianzhu5=15 Then
        Call 升级民房6()
    End If
    If jianzhu5=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑6()
    If jianzhu6=1Then
        Call 升级主城()
    End If
    If jianzhu6=2Then
        Call 升级军机处()
    End If
    If jianzhu6=3 Then
        Call 升级兵营()
    End If
    If jianzhu6=4 Then
        Call 升级校场()
    End If
    If jianzhu6=5 Then
        Call 升级商店()
    End If
    If jianzhu6=6 Then
        Call 升级市场()
    End If
    If jianzhu6=7 Then
        Call 升级粮仓()
    End If
    If jianzhu6=8 Then
        Call 升级银库()
    End If
    If jianzhu6=9 Then
        Call 升级帐房()
    End If
    If jianzhu6=10 Then
        Call 升级民房1()
    End If
    If jianzhu6=11 Then
        Call 升级民房2()
    End If
    If jianzhu6=12 Then
        Call 升级民房3()
    End If
    If jianzhu6=13 Then
        Call 升级民房4()
    End If
    If jianzhu6=14 Then
        Call 升级民房5()
    End If
    If jianzhu6=15 Then
        Call 升级民房6()
    End If
    If jianzhu6=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑7()
    If jianzhu7=1Then
        Call 升级主城()
    End If
    If jianzhu7=2Then
        Call 升级军机处()
    End If
    If jianzhu7=3 Then
        Call 升级兵营()
    End If
    If jianzhu7=4 Then
        Call 升级校场()
    End If
    If jianzhu7=5 Then
        Call 升级商店()
    End If
    If jianzhu7=6 Then
        Call 升级市场()
    End If
    If jianzhu7=7 Then
        Call 升级粮仓()
    End If
    If jianzhu7=8 Then
        Call 升级银库()
    End If
    If jianzhu7=9 Then
        Call 升级帐房()
    End If
    If jianzhu7=10 Then
        Call 升级民房1()
    End If
    If jianzhu7=11 Then
        Call 升级民房2()
    End If
    If jianzhu7=12 Then
        Call 升级民房3()
    End If
    If jianzhu7=13 Then
        Call 升级民房4()
    End If
    If jianzhu7=14 Then
        Call 升级民房5()
    End If
    If jianzhu7=15 Then
        Call 升级民房6()
    End If
    If jianzhu7=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑8()
    If jianzhu8=1Then
        Call 升级主城()
    End If
    If jianzhu8=2Then
        Call 升级军机处()
    End If
    If jianzhu8=3 Then
        Call 升级兵营()
    End If
    If jianzhu8=4 Then
        Call 升级校场()
    End If
    If jianzhu8=5 Then
        Call 升级商店()
    End If
    If jianzhu8=6 Then
        Call 升级市场()
    End If
    If jianzhu8=7 Then
        Call 升级粮仓()
    End If
    If jianzhu8=8 Then
        Call 升级银库()
    End If
    If jianzhu8=9 Then
        Call 升级帐房()
    End If
    If jianzhu8=10 Then
        Call 升级民房1()
    End If
    If jianzhu8=11 Then
        Call 升级民房2()
    End If
    If jianzhu8=12 Then
        Call 升级民房3()
    End If
    If jianzhu8=13 Then
        Call 升级民房4()
    End If
    If jianzhu8=14 Then
        Call 升级民房5()
    End If
    If jianzhu8=15 Then
        Call 升级民房6()
    End If
    If jianzhu8=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑9()
    If jianzhu9=1Then
        Call 升级主城()
    End If
    If jianzhu9=2Then
        Call 升级军机处()
    End If
    If jianzhu9=3 Then
        Call 升级兵营()
    End If
    If jianzhu9=4 Then
        Call 升级校场()
    End If
    If jianzhu9=5 Then
        Call 升级商店()
    End If
    If jianzhu9=6 Then
        Call 升级市场()
    End If
    If jianzhu9=7 Then
        Call 升级粮仓()
    End If
    If jianzhu9=8 Then
        Call 升级银库()
    End If
    If jianzhu9=9 Then
        Call 升级帐房()
    End If
    If jianzhu9=10 Then
        Call 升级民房1()
    End If
    If jianzhu9=11 Then
        Call 升级民房2()
    End If
    If jianzhu9=12 Then
        Call 升级民房3()
    End If
    If jianzhu9=13 Then
        Call 升级民房4()
    End If
    If jianzhu9=14 Then
        Call 升级民房5()
    End If
    If jianzhu9=15 Then
        Call 升级民房6()
    End If
    If jianzhu9=16 Then
        Call 升级民房7()
    End If
    Goto 开始
End Sub
Sub 建筑10()
    If jianzhu10=1Then
        Call 升级主城()
    End If
    If jianzhu10=2Then
        Call 升级军机处()
    End If
    If jianzhu10=3 Then
        Call 升级兵营()
    End If
    If jianzhu10=4 Then
        Call 升级校场()
    End If
    If jianzhu10=5 Then
        Call 升级商店()
    End If
    If jianzhu10=6 Then
        Call 升级市场()
    End If
    If jianzhu10=7 Then
        Call 升级粮仓()
    End If
    If jianzhu10=8 Then
        Call 升级银库()
    End If
    If jianzhu10=9 Then
        Call 升级帐房()
    End If
    If jianzhu10=10 Then
        Call 升级民房1()
    End If
    If jianzhu10=11 Then
        Call 升级民房2()
    End If
    If jianzhu10=12 Then
        Call 升级民房3()
    End If
    If jianzhu10=13 Then
        Call 升级民房4()
    End If
    If jianzhu10=14 Then
        Call 升级民房5()
    End If
    If jianzhu10=15 Then
        Call 升级民房6()
    End If
    If jianzhu10=16 Then
        Call 升级民房7()
    End If
    Goto 轮
End Sub
Sub 升级主城()
    Call 点击主城()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房1()
    Call 点击民居1()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房2()
    Call 点击民居2()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房3()
    Call 点击民居3()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房4()
    Call 点击民居4()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房5()
    Call 点击民居5()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房6()
    Call 点击民居6()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级民房7()
    Call 点击民居7()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级军机处()
    Call 点击军机处()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级兵营()
    Call 点击兵营()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级校场()
    Call 点击校场()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级商店()
    Call 点击商店()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级市场()
    Call 点击市场()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级粮仓()
    Call 点击粮仓()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级银库()
    Call 点击银库()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
Sub 升级帐房()
    Call 点击帐房()
    Delay 3000
    Call 升级动作()
    Delay 3000
End Sub
//---------------升级部分结束-----------
//-----------------点击部分-----------
Sub 点击主城()
    MoveTo zbX+258,zbY+271
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居1()
    MoveTo zbX+252,zbY+152
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居2()
    MoveTo zbX+320,zbY+196
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居3()
    MoveTo zbX+395,zbY+236
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居4()
    MoveTo zbX+470,zbY+286
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居5()
    MoveTo zbX+402,zbY+334
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居6()
    MoveTo zbX+316,zbY+110
    Delay 1000
    LeftClick 1
End Sub
Sub 点击民居7()
    MoveTo zbX+389,zbY+155
    Delay 1000
    LeftClick 1
End Sub
Sub 点击军机处()
    MoveTo zbX+339,zbY+371
    Delay 1000
    LeftClick 1
End Sub
Sub 点击兵营()
    MoveTo zbX+265,zbY+404
    Delay 1000
    LeftClick 1
End Sub
Sub 点击校场()
    MoveTo zbX+196,zbY+365
    Delay 1000
    LeftClick 1
End Sub
Sub 点击商店()
    MoveTo zbX+121,zbY+315
    Delay 1000
    LeftClick 1
End Sub
Sub 点击市场()
    MoveTo zbX+52,zbY+301
    Delay 1000
    LeftClick 1
End Sub
Sub 点击粮仓()
    MoveTo zbX+121,zbY+243
    Delay 1000
    LeftClick 1
End Sub
Sub 点击银库()
    MoveTo zbX+185,zbY+188
    Delay 1000
    LeftClick 1
End Sub
Sub 点击帐房()
    MoveTo zbX+113,zbY+149
    Delay 1000
    LeftClick 1
End Sub
Sub 点击军团()
    MoveTo zbX+466,zbY+562
    Delay 1000
    LeftClick 1
End Sub
Sub 点击强化()
    MoveTo zbX+505,zbY+560
    Delay 1000
    LeftClick 1
End Sub
Sub 点击任务()
    MoveTo zbX+548,zbY+560
    Delay 1000
    LeftClick 1
End Sub
Sub 点击部队()
    MoveTo zbX+587,zbY+558
    Delay 1000
    LeftClick 1
End Sub
Sub 点击主城字()
    MoveTo zbX+634,zbY+551
    Delay 1000
    LeftClick 1
End Sub
Sub 点击征战()
    MoveTo zbX+633,zbY+510
    Delay 1000
    LeftClick 1
End Sub
Sub 点击地区()
    MoveTo zbX+653,zbY+471
    Delay 1000
    LeftClick 1
End Sub
Sub 点击世界()
    MoveTo zbX+690,zbY+457
    Delay 1000
    LeftClick 1
End Sub
Sub 点击农田()
    MoveTo zbX+733,zbY+466
    Delay 1000
    LeftClick 1
End Sub
Sub 升级动作()
    MoveTo zbX+191,zbY+334
    Delay 1000
    LeftClick 1
End Sub
//---------------点击部分结束-----------
//---------------农田部分-----------
Sub 占领农田()
    Delay 1000
    Call 点击农田()
    Delay 5000
    MoveTo zbX+228,zbY+230
    Call 别人农田判断()
    MoveTo zbX+378,zbY+234
    Call 别人农田判断()
    MoveTo zbX+302,zbY+287
    Call 别人农田判断()
    MoveTo zbX+299,zbY+170
    Call 别人农田判断()
    MoveTo zbX+227,zbY+340
    Call 别人农田判断()
    MoveTo zbX+142,zbY+175
    Call 别人农田判断()
    MoveTo zbX+461,zbY+289
    Call 别人农田判断()
    MoveTo zbX+312,zbY+397
    Call 别人农田判断()
    MoveTo zbX+146,zbY+297
    Call 别人农田判断()
    MoveTo zbX+69,zbY+226
    Call 别人农田判断()
    MoveTo zbX+70,zbY+332
    Call 别人农田判断()
    MoveTo zbX+152,zbY+388
    Call 别人农田判断()
    MoveTo zbX+385,zbY+341
    Call 别人农田判断()
    MoveTo zbX+215,zbY+119
    Call 别人农田判断()
    MoveTo zbX+372,zbY+123
    Call 别人农田判断()
    MoveTo zbX+447,zbY+181
    Call 别人农田判断()
End Sub
Sub 自己农田判断()
    MoveTo zbX+228,zbY+230
    Delay 1000
    LeftClick 1
    Delay 1000
    MoveTo zbX+399,zbY+251
    Delay 1000
    LeftClick 1
    Delay 3000
    FindPic 0,0,1024,768,"Attachment:\qd.bmp",0.9,intX,intY
    If intX > 0 And intY > 0 Then
        MoveTo intX+5,intY+5
        Delay 1000
        LeftClick 1
        Call 点击主城字()
        Goto NT
    End If
End Sub
Sub 别人农田判断()
    Delay 1500
    LeftClick 1
    Delay 5000
    IfColor zbX+153,zbY+341,"cccccc",0 Then
        MoveTo zbX+436,zbY+184
        Delay 1500
        LeftClick 1
        Delay 1500
        Goto ntpd
    End If
    
    Delay 1000
    MoveTo zbX+370,zbY+250
    Delay 1000
    LeftClick 1
    Delay 3000
    FindPic 0,0,1024,768,"Attachment:\qd.bmp",0.9,h1X,h1Y
    If h1X > 0 And h1Y > 0 Then
        MoveTo h1x+5,h1y+5
        Delay 1000
        LeftClick 1
        Delay 3000
        Call 点击主城字()
        Goto NT
    Else
        Delay 60000
        MoveTo zbX+300,zbY+415
        Delay 1000
        LeftClick 1
        Delay 5000

        Call 点击主城字()
    End If
    
    Rem ntpd
End Sub
//-------------农田部分结束-----------
//-------------  银矿部分-----------
Sub 银矿占领()
    Delay 1000
    Call 点击地区()
    Delay 5000
    MoveTo zbx+140,zby+530
    Delay 2000
    LeftDoubleClick 1
    Delay 1000
    SayString "1"
    Delay 1000
    MoveTo zbx+214,zby+525
    Delay 1000
    LeftClick 1
    Delay 5000
    Rem YK

    Delay 5000
    MoveTo zbX+228,zbY+230
    Call 别人银矿判断()
    MoveTo zbX+378,zbY+234
    Call 别人银矿判断()
    MoveTo zbX+302,zbY+287
    Call 别人银矿判断()
    MoveTo zbX+299,zbY+170
    Call 别人银矿判断()
    MoveTo zbX+227,zbY+340
    Call 别人银矿判断()
    MoveTo zbX+142,zbY+175
    Call 别人银矿判断()
    MoveTo zbX+461,zbY+289
    Call 别人银矿判断()
    MoveTo zbX+312,zbY+397
    Call 别人银矿判断()
    MoveTo zbX+146,zbY+297
    Call 别人银矿判断()
    MoveTo zbX+69,zbY+226
    Call 别人银矿判断()
    MoveTo zbX+70,zbY+332
    Call 别人银矿判断()
    MoveTo zbX+152,zbY+388
    Call 别人银矿判断()
    MoveTo zbX+385,zbY+341
    Call 别人银矿判断()
    MoveTo zbX+215,zbY+119
    Call 别人银矿判断()
    MoveTo zbX+372,zbY+123
    Call 别人银矿判断()
    MoveTo zbX+447,zbY+181
    Call 别人银矿判断()
    MoveTo zbX+212,zbY+557
    Delay 1000
    LeftClick 1
    Delay 5000
    Goto YK
End Sub
Sub 自己银矿判断()
    MoveTo zbX+228,zbY+230
    Delay 1000
    LeftClick 1
    Delay 1000
    MoveTo zbX+399,zbY+251
    Delay 1000
    LeftClick 1
    Delay 3000
    FindPic 0,0,1024,768,"Attachment:\qd.bmp",0.9,h2X,h2Y
    If h2X > 0 And h2Y > 0 Then
        MoveTo h2x+5,h2y+5
        Delay 1000
        LeftClick 1
        Call 点击主城字()
        Goto YKZL
    End If
End Sub
Sub 别人银矿判断()
    Delay 1500
    LeftClick 1
    Delay 5000
    IfColor zbX+169,zbY+331,"cccccc",0 Then
        MoveTo zbX+436,zbY+184
        Delay 1500
        LeftClick 1
        Delay 1500
        Goto ykpd
    End If
    
    Delay 1000
    MoveTo zbX+370,zbY+250
    Delay 1000
    LeftClick 1
    Delay 3000
    FindPic 0,0,1024,768,"Attachment:\qd.bmp",0.9,h3X,h3Y
    If h3x > 0 And h3y > 0 Then
        Delay 2000
        MoveTo zbx+257,zby+343
        Delay 1000
        LeftClick 1
        Delay 3000
        Call 点击主城字()
        Goto YKZL
    Else
        Delay 60000
        MoveTo zbX+300,zbY+415
        Delay 1000
        LeftClick 1
        Delay 5000
        Call 点击主城字()
    End If
    
    Rem ykpd
End Sub
//-------------银矿部分结束-----------
//-------------  征收部分-----------
Sub 征收()
    Delay 1000
    Call 点击主城()
    Delay 1000
    MoveTo zbX+310,zbY+308
    Delay 1000
    LeftClick 1
    Delay 1000
    MoveTo zbX+255,zbY+225
    Delay 1000
    LeftClick 1
    Delay 3000
    FindPic 0,0,1024,768,"Attachment:\qd.bmp",0.9,aX,aY
    If ax > 0 And ay > 0 Then
        MoveTo aX+5,aY+5
        Delay 1000
        LeftClick 1
    End If
    Delay 1000
    MoveTo zbX+567,zbY+92
    Delay 1000
    LeftClick 1
End Sub
//-------------征收部分结束-----------
//---------------科技-----------
Sub 升级科技()
    Delay 1000
    Call 点击军机处()
    Delay 2000
    MoveTo zbx+312,zby+309
    Delay 1000
    LeftClick 1
    Delay 2000
    If keji=1 Then
        MoveTo zbx-17,zby+195
        Delay 1000
        LeftClick 1
    End If
    If keji=2 Then
        MoveTo zbx+60,zby+195
        Delay 1000
        LeftClick 1
    End If
    If keji=3 Then
        MoveTo zbx+134,zby+195
        Delay 1000
        LeftClick 1
    End If
    If keji=4 Then
        MoveTo zbx+205,zby+195
        Delay 1000
        LeftClick 1
    End If
    If keji=5 Then
        MoveTo zbx+281,zby+195
        Delay 1000
        LeftClick 1
    End If
    If keji=6 Then
        MoveTo zbx-17,zby+274
        Delay 1000
        LeftClick 1
    End If
    If keji=7 Then
        MoveTo zbx+60,zby+274
        Delay 1000
        LeftClick 1
    End If
    If keji=8 Then
        MoveTo zbx+134,zby+274
        Delay 1000
        LeftClick 1
    End If
    If keji=9 Then
        MoveTo zbx+205,zby+274
        Delay 1000
        LeftClick 1
    End If
    If keji=10 Then
        MoveTo zbx+281,zby+274
        Delay 1000
        LeftClick 1
    End If
    If keji=11 Then
        MoveTo zbx-17,zby+342
        Delay 1000
        LeftClick 1
    End If
    If keji=12 Then
        MoveTo zbx+60,zby+342
        Delay 1000
        LeftClick 1
    End If
    If keji=13 Then
        MoveTo zbx+134,zby+342
        Delay 1000
        LeftClick 1
    End If
    Delay 1000
    MoveTo zbx+381,zby+357
    Delay 1000
    LeftClick 1
    Delay 1000
    MoveTo zbx+566,zby+91
    Delay 1000
    LeftClick 1
End Sub
//-------------科技结束-----------
//-------------训练部分-----------
Sub 突飞猛进()
    Delay 1000
    Call 点击部队()
    Delay 5000
    If xunlian=1 Then
        Delay 1000
        MoveTo zbx+68,zby+200
        Delay 1000
        LeftClick 1
    End If
    If xunlian=2 Then
        Delay 1000
        MoveTo zbx+68,zby+216
        Delay 1000
        LeftClick 1
    End If
    If xunlian=3 Then
        Delay 1000
        MoveTo zbx+68,zby+239
        Delay 1000
        LeftClick 1
    End If
    If xunlian=4 Then
        Delay 1000
        MoveTo zbx+68,zby+258
        Delay 1000
        LeftClick 1
    End If
    Delay 1000
    MoveTo zbx+444,zby+404
    Delay 1000
    LeftClick 1
    Delay 1000
    MoveTo zbx+566,zby+91
    Delay 1000
    LeftClick 1
End Sub
//-----------训练部分结束-----------
