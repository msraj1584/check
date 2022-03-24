<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="Gerber.aspx.vb" Inherits="EXP1.Gerber" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>GERBER</title>
    <link href="Style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type="text/css">
        .auto-style1 {
            height: 26px;
        }
    </style>
</head>
<body class="container-fluid">
    <form id="form1" runat="server">
        <p>
            <asp:Label ID="Label1" runat="server" Text="Mac Pro - Tricom" style="text-align:center;" CssClass="Label" Font-Bold="True" Font-Size="20px" Width="100%"></asp:Label>
        </p>
        <asp:Panel ID="Panel1" runat="server" CssClass="panel1" Width="100%">
            <asp:Label ID="Label2" runat="server" CssClass="hmenu" ForeColor="White" Text="Master Setup"></asp:Label>
            <asp:Label ID="Label3" runat="server" CssClass="hmenu" ForeColor="White" Text="Bulk Milk Supplier Operation"></asp:Label>
            <asp:Label ID="Label4" runat="server" CssClass="hmenu" ForeColor="White" Text="Society Operation"></asp:Label>
            <asp:Label ID="Label5" runat="server" CssClass="hmenu" ForeColor="White" Text="Asset Management"></asp:Label>
            <asp:Label ID="Label6" runat="server" CssClass="hmenu" ForeColor="White" Text="Reports"></asp:Label>
            <asp:Label ID="Label7" runat="server" CssClass="hmenu" ForeColor="White" Text="Console"></asp:Label>
            <asp:Label ID="Label8" runat="server" CssClass="hmenu" ForeColor="White" Text="Account"></asp:Label>
        </asp:Panel>
        <p>
            <asp:Label ID="Label9" runat="server" Text="AGENT GERBER MILK SAMPLE TEST ENTRY" style="text-align:center;" CssClass="lab1" Font-Bold="True" Font-Size="15px" Width="100%"></asp:Label>
        </p>
        <asp:Label ID="Label10" runat="server" CssClass="lb1" Text="BMC Name:"></asp:Label>
        <asp:Label ID="Label12" runat="server" CssClass="lb1" Text="Shift Date:"></asp:Label>
        <asp:Label ID="Label13" runat="server" CssClass="lb1" Text="Shift Type:"></asp:Label>
        <br />
        <asp:DropDownList ID="DropDownList3" runat="server" CssClass="drp" Height="33px" Width="228px">
            <asp:ListItem>Select</asp:ListItem>
            <asp:ListItem>vfuf</asp:ListItem>
            <asp:ListItem>uayhgfyu</asp:ListItem>
            <asp:ListItem>gig</asp:ListItem>
            <asp:ListItem>vxjh</asp:ListItem>
            <asp:ListItem>jhvhj</asp:ListItem>
        </asp:DropDownList>
        <asp:DropDownList ID="DropDownList1" runat="server" CssClass="drp" Height="34px" Width="217px">
            <asp:ListItem>Select</asp:ListItem>
            <asp:ListItem>22-03-2022</asp:ListItem>
            <asp:ListItem>23-03-2022</asp:ListItem>
        </asp:DropDownList>
        <asp:DropDownList ID="DropDownList2" runat="server" CssClass="drp" Height="33px" Width="247px">
            <asp:ListItem>Select</asp:ListItem>
            <asp:ListItem>Morning</asp:ListItem>
            <asp:ListItem>Evening</asp:ListItem>
        </asp:DropDownList>
        <br />
        <br />
        <asp:Button ID="Button1" runat="server" CssClass="btn1" Text="Refresh" />
        <asp:Button ID="Button2" runat="server" CssClass="btn2" Text="Cancel" />


         <br />
        <p>
            &nbsp;</p>
        <asp:Panel ID="Panel2" runat="server" CssClass="panel" Height="221px" >
            <asp:Panel ID="Panel3" runat="server" ForeColor="#EAEDF1">
                <asp:Button ID="Button3" runat="server" CssClass="pbtn" Text="+ Add new record" />
                <asp:Button ID="Button4" runat="server" CssClass="pbtn" Text="Save Changes" />
                <asp:Button ID="Button5" runat="server" CssClass="pbtn" Text="Cancel Changes" />
            </asp:Panel>
             <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Route</th>
      <th scope="col">Agent ID</th>
      <th scope="col">Agent Name</th>
    <th scope="col">FAT</th>
        <th scope="col">SNF</th>
        <th scope="col">CATTLE</th>
        <th scope="col">CLR</th>
        <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
        <td></td>
        <td></td>
        <td>No records to display</td>
          <td></td>
        <td></td>
        <td></td>
          <td></td>
        <td></td>
        
    </tr>
   
  </tbody>
</table>
             <hr />
        <asp:Panel ID="Panel4" runat="server">
            <asp:Label ID="Label14" runat="server" Text="Count:" CssClass="count"></asp:Label>
        </asp:Panel>
            <asp:Panel ID="Panel5" runat="server" ForeColor="#EAEDF1">
                <asp:Button ID="Button6" runat="server" CssClass="pbtn" Text="+ Add new record" />
                <asp:Button ID="Button7" runat="server" CssClass="pbtn" Text="Save Changes" />
                <asp:Button ID="Button8" runat="server" CssClass="pbtn" Text="Cancel Changes" />
            </asp:Panel>
        </asp:Panel>
       
       
       
    </form>

    <p>Copyright © 2022, Tricom Technologies. All Rights Reserved. Build Version: 2.6.1.0.</p>


     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
    </body>
</html>
