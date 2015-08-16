
<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<title><?php echo escape($user->data()->name); ?> Shopping List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , intial-scale=1.0 , maximum-scale=1.0">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/normalize.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/foundation.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/app-screen.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/app-print.css" media="print">
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/shopping-list.js"></script>
</head>
<body ng-controller="shoppingListController">

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php"><i class="fa fa-list">&nbsp</i>List Me</a></h1>
    </li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"><a href="logout.php">Log Out</a></li>
    </ul/>
  </section>
</nav>


<div class="row">
<div class="column">
	<h1><?php echo escape($user->data()->name); ?> Shopping List</h1>
	<form id="addForm" ng-submit="insert()">
		<div class="row">
			<div class="column">
				<span class="spanLabel" ng-show="!minimumCharactersMet()">You need at least {{ howManyMoreCharactersNeeded()}} characters more</span>
				<span class="spanLabel" ng-show="isNumberOfCharactersWithinRange()">Remaining characters: {{ howManyCharactersRemaining() }}</span>
				<span class="spanLabel warning" ng-show="anyCharactersOver()"> {{ howManyCharactersOver() }} characters too many</span>
			</div>	

		</div>
		<div class="row">
			<div class="large-8 columns">
				<input type="text" 
				name="item" 
				ng-model="item"
				ng-trim="false"
				placeholder="Item"/>
			</div>
			<div class="large-2 columns">
				<input type="text" 
				name="qty" 
				ng-model="qty"
				ng-trim="false"
				placeholder="Qty/Weight"/>
			</div>
			<div class="large-2 columns">
				<select 
				name="type"
				ng-model="type">
					<option 
					ng-repeat="type in types"
					value="{{ type.id }}">{{type.name}}</option>
				</select>
			</div>
		</div>	
		<div class="row">
			<div class="column">
				<div class="show-for-medium-up">
						<div class="flr">
						<button 
						type="button" 
						class="small button primary"
						ng-click="print()"
						>
						<i class="fa fa-print"></i>
						Print List</button>
						<button 
						type="button" 
						class="small button alert"
						ng-click="remove()"
						>
						<i class="fa fa-times"></i>
						Clear Completed</button>
					</div>
					<button 
						type="submit" 
						class="small button"
						ng-disabled="!goodToGo()"
						>
						<i class="fa fa-plus"></i>
						Add</button>
					<button 
						type="submit" 
						class="small button secondary"
						ng-click="clear()">
						<i class="fa fa-ban"></i>
						Clear Entry</button>
				</div>
				<div class="show-for-small-only">
					<ul class="button-group even-4">
						<li>
							<button 
							type="submit" 
							class="small button"
							ng-disabled="!goodToGo()">
							<i class="fa fa-plus"></i>
							</button>
								
						</li>
						<li>
							<button 
							type="submit" 
							class="small button secondary"
							ng-click="clear()">
							<i class="fa fa-ban"></i>
							</button>
						</li>
						<li>
							<button 
							type="button" 
							class="small button primary"
							ng-click="print()">
							<i class="fa fa-print"></i>
							</button>
						</li>
						<li>
							<button 
							type="button" 
							class="small button alert"
							ng-click="remove()">
							<i class="fa fa-times"></i>
							</button>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
	</form>

	<form id="items">
		<div 
		class="row" 
		ng-repeat="item in items"
		ng-class="{'done': item.done == 1}"
		>
			<div class="small-8 columns itemName">
				<label for="item-{{ item.id }}">
					<input 
					type="checkbox"
					name="item-{{ item.id }}"
					id="item-{{ item.id }}"
					ng-model= "item.done"
					ng-true-value="1"
					ng-false-value="0"
					ng-change="update(item)"
					ng-checked="item.done == 1"
					>
					{{item.item}}
				</label>
			</div>
			<div class="small-2 columns itemQty">
				{{item.qty}}
			</div>
			<div class="small-2 columns itemType">
				{{item.type_name}}
			</div>
		</div>	
	</form>
</div>
</div>

</body>
</html>