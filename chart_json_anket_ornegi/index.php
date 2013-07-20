<!DOCTYPE html>
<html>
    <head>
    <title>extjs chart php anket sonuç gösterimi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="extjs dersleri,extjs örnekleri" /> 
    <meta name="keywords" content="ismail kocacan,extjs with php,extjs charts,extjs poll,extjs anket" /> 

    <link href="../extjs/resources/css/ext-all.css" rel="stylesheet" type="text/css" />
    <script src="../extjs/ext-all.js" type="text/javascript"></script> 
    <script  language="javascript" type="text/javascript">
        Ext.onReady(function () {

            
            var storeResults = Ext.create('Ext.data.JsonStore', {
                fields: [
                    { name: 'Percent', type: 'float' },
                    { name: 'AnswerText', type: 'String'}],
                autoLoad: true,
                proxy: {
                    type: 'ajax',
                    url: 'getdata.php',
                    reader: {
                        type: 'json',
                        root: 'Result'
                    }
                }
            });
            
            
            Ext.create('Ext.chart.Chart', {
                renderTo: Ext.getBody(),
                width: 500,
                height: 350,
                animate: true,
                store: storeResults,
                theme: 'Base:gradients',
                series: [{
                        type: 'pie',
                        field: 'Percent',
                        showInLegend: true,
                        tips: {
                            trackMouse: true,
                            width: 140,
                            height: 28,
                            renderer: function (storeItem, item) {
                                this.setTitle('% :' + storeItem.get('Percent'));
                            }
                        },
                        highlight: {
                            segment: {
                                margin: 20
                            }
                        },
                        label: {
                            field: 'AnswerText',
                            display: 'rotate',
                            contrast: true,
                            font: '18px Arial'
                        }
                    }]
            }); 
          
            
        });
    </script> 
</head>
<body>

</body>
</html>
